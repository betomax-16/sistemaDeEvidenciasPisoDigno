<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class PaypalController extends Controller
{
  private $_api_context;
  public function __construct()
  {
    // setup PayPal api context
    $paypal_conf = \Config::get('paypal');
    $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
    $this->_api_context->setConfig($paypal_conf['settings']);
  }

  public function postPayment(Request $request)
  {
    $rules = [
        'donativo' => 'required|regex:/^\d+(?:\.\d{2})?$/',
    ];
    $validacion = Validator::make($request->all(), $rules);

    if ($validacion->fails()) {
      return redirect()->back()->withInput()->withErrors($validacion->errors());
    }
    $payer = new Payer();
		$payer->setPaymentMethod('paypal');

		$total = $request->donativo;
		$currency = 'MXN';

  /*  $item1 = new Item();
$item1->setName('Ground Coffee 40 oz')
    ->setCurrency($currency)
    ->setQuantity(1)
    ->setSku("123123") // Similar to `item_number` in Classic API
    ->setPrice(7.5);
$item2 = new Item();
$item2->setName('Granola bars')
    ->setCurrency($currency)
    ->setQuantity(5)
    ->setSku("321321") // Similar to `item_number` in Classic API
    ->setPrice(2);

$itemList = new ItemList();
$itemList->setItems(array($item1, $item2));*/
$item = new Item();
$item->setName('Donaciona a GSUPPuebla')
     ->setCurrency($currency)
     ->setQuantity(1)
     ->setPrice($total);
$itemList = new ItemList();
$itemList->setItems(array($item));
$details = new Details();
$details->setSubtotal($total);
/*$details->setShipping(1.2)
    ->setTax(1.3)
    ->setSubtotal(17.50);*/
$amount = new Amount();
$amount->setCurrency($currency)
    ->setTotal($total)
    ->setDetails($details);

    $transaction = new Transaction();
    $transaction->setAmount($amount)
        ->setItemList($itemList)
        ->setDescription("Donacion prueba")
        ->setInvoiceNumber(uniqid());

		$redirect_urls = new RedirectUrls();
		$redirect_urls->setReturnUrl(\URL::route('payment.status'))
			            ->setCancelUrl(\URL::route('payment.status'));

		$payment = new Payment();
		$payment->setIntent('Sale')
			->setPayer($payer)
			->setRedirectUrls($redirect_urls)
			->setTransactions(array($transaction));

		try {
			$payment->create($this->_api_context);
		} catch (\PayPal\Exception\PPConnectionException $ex) {
			if (\Config::get('app.debug')) {
				echo "Exception: " . $ex->getMessage() . PHP_EOL;
				$err_data = json_decode($ex->getData(), true);
				exit;
			} else {
				die('Ups! Algo salió mal');
			}
		}

		foreach($payment->getLinks() as $link) {
			if($link->getRel() == 'approval_url') {
				$redirect_url = $link->getHref();
				break;
			}
		}

		// add payment ID to session
		\Session::put('paypal_payment_id', $payment->getId());

		if(isset($redirect_url)) {
			// redirect to paypal
			return \Redirect::away($redirect_url);
		}

		return \Redirect::route('donacion')
			->with('error', 'Ups! Error desconocido.');
  }

  public function getPaymentStatus(Request $request)
	{
		// Get the payment ID before session clear
		$payment_id = \Session::get('paypal_payment_id');

		// clear the session payment ID
		\Session::forget('paypal_payment_id');

		//$payerId = \Input::get('PayerID');
    $payerId = $request->PayerID;
		$token = $request->token;

		//if (empty(\Input::get('PayerID')) || empty(\Input::get('token'))) {
		if (empty($payerId) || empty($token)) {
			return \Redirect::route('donacion')
				->with('message', 'Hubo un problema al intentar pagar con Paypal');
		}

		$payment = Payment::get($payment_id, $this->_api_context);

		// PaymentExecution object includes information necessary
		// to execute a PayPal account payment.
		// The payer_id is added to the request query parameters
		// when the user is redirected from paypal back to your site
		$execution = new PaymentExecution();
		$execution->setPayerId($payerId);

		//Execute the payment
		$result = $payment->execute($execution, $this->_api_context);
		//echo '<pre>';print_r($result);echo '</pre>';exit; // DEBUG RESULT, remove it later

		if ($result->getState() == 'approved') { // payment made
			// Registrar el pedido --- ok
			// Registrar el Detalle del pedido  --- ok
			// Eliminar carrito
			// Enviar correo a user
			// Enviar correo a admin
			// Redireccionar

			return \Redirect::route('donacion')
				->with('message', 'Compra realizada de forma correcta');
		}
		return \Redirect::route('donacion')
			->with('message', 'La compra fue cancelada');
	}


	private function saveOrder($cart)
	{
	    $subtotal = 0;
	    foreach($cart as $item){
	        $subtotal += $item->price * $item->quantity;
	    }

	    $order = Order::create([
	        'subtotal' => $subtotal,
	        'shipping' => 100,
	        'user_id' => \Auth::user()->id
	    ]);

	    foreach($cart as $item){
	        $this->saveOrderItem($item, $order->id);
	    }
	}

	private function saveOrderItem($item, $order_id)
	{
		OrderItem::create([
			'quantity' => $item->quantity,
			'price' => $item->price,
			'product_id' => $item->id,
			'order_id' => $order_id
		]);
	}
}
