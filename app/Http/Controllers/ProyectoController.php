<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Proyecto;
use App\Estado;
use Validator;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      Session::forget('proyecto');
      Session::forget('estado');
      $proyectos = Auth::user()->proyectos()->paginate(5);
      return view('usuarios/proveedorEvidencias/proyectos/listaProyectos')->with('proyectos', $proyectos);
    }

    public function proyectosPorPrograma($programa)
    {
      Session::forget('proyecto');
      Session::forget('estado');
      Session::put('programa', $programa);
      $programas = ['VIVIENDA', 'SALUD', 'ALIMENTOS', 'EDUCACION', 'MEDIO_AMBIENTE'];
      if (in_array(strtoupper($programa), $programas)) {
        if (Auth::guest() || Auth::user()->role == 'ROLE_ADMIN') {
          $proyectos = Proyecto::where('tipo', '=', $programa)->paginate(10);
        }
        else {
          $proyectos = Auth::User()->proyectos()->where('tipo', '=', $programa)->paginate(10);
        }
        $estado = Estado::find(21);
        return view('proyectos/listaProyectos')->with('proyectos', $proyectos)->with('estado', $estado)->with('programa', $programa);
      }
      else {
        # programa ineccistente
      }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Session::has('programa')) {
          return view('welcome');
        }
        return view('proyectos/crearProyecto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $rules = [
          'nombre' => 'required|max:255|unique:Proyectos',
          'tipo' => 'required',
      ];

      $validacion = Validator::make($request->all(), $rules);

      if ($validacion->fails()) {
        return redirect()->back()->withInput()->withErrors($validacion->errors());
      }

      $proyecto = new Proyecto($request->all());
      $proyecto->save();
      return redirect()->route('proyectosPorPrograma', Session::get('programa'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Session::has('programa')) {
          return view('welcome');
        }
        $proyecto = Proyecto::find($id);
        return view('proyectos/editarProyecto')->with('proyecto', $proyecto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $rules = [
          'nombre' => 'required|max:255|unique:Proyectos',
          'tipo' => 'required',
      ];

      $validacion = Validator::make($request->all(), $rules);

      if ($validacion->fails()) {
        return redirect()->back()->withInput()->withErrors($validacion->errors());
      }

      $proyecto = Proyecto::find($id);
      $proyecto->nombre = $request->nombre;
      $proyecto->save();
      return redirect()->route('proyectosPorPrograma', Session::get('programa'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
          $proyecto = Proyecto::find($id);
          $proyecto->delete();
          return response()->json([
            'message' =>  'Proyecto eliminado exitosamente.'
          ]);
        }
    }
}
