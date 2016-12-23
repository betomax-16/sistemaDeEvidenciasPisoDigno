<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class VisitanteController extends Controller
{
  public function contacto()
  {
    return view('visitante/contacto');
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
