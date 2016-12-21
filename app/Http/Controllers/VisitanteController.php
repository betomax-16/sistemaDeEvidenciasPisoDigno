<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitanteController extends Controller
{
  public function contacto()
  {
    return view('visitante/contacto');
  }

  public function enviarContacto(Request $request)
  {
    dd($request->all());
  }
}
