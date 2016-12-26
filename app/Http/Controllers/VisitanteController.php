<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

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
        'email' => 'required|email|max:255',
        'mensaje' => 'required|max:255',
    ];

    $validacion = Validator::make($request->all(), $rules);

    if ($validacion->fails()) {
      return redirect()->back()->withInput()->withErrors($validacion->errors());
    }

    dd($request->all());
  }
}
