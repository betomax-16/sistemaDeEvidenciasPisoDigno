<?php

namespace App\Http\Controllers;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Validator;
use Mail;

class VisitanteController extends Controller
{
  private function noGuardarCache($view)
  {
    $response = response($view, 200);
    $response->header('Expires', 'Tue, 1 Jan 1980 00:00:00 GMT');
    $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    $response->header('Pragma', 'no-cache');
    return $response;
  }

  public function contacto()
  {
    return $this->noGuardarCache(view('visitante/contacto'));
  }

  public function enviarContacto(Request $request)
  {
    $rules = [
        'nombre' => 'required|max:255',
        'telefono' => 'required',
        'email' => 'required|email|max:255',
        'asunto' => 'required|max:255',
        'mensaje' => 'required|max:255',
    ];

    $validacion = Validator::make($request->all(), $rules);

    if ($validacion->fails()) {
      return redirect()->back()->withInput()->withErrors($validacion->errors());
    }

    $this->enviarCorreo($request);
    flash('Mensaje enviado exitosamente.', 'success');
    return redirect()->route('contacto');
  }

  private function enviarCorreo(Request $request)
  {
    Mail::send('emails.contacto',['data' => $request],function ($mensaje) use ($request)
    {
      $mensaje->to('contacto@gsuppuebla.org')
              ->subject($request->asunto)
              ->from($request->email, $request->nombre);
    });
  }

  public function quienesSomos()
  {
    return $this->noGuardarCache(view('visitante/somos'));
  }

  public function donacion()
  {
    return $this->noGuardarCache(view('visitante/donacion'));
  }
}
