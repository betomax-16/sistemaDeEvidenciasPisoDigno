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
    private function noGuardarCache($view)
    {
      $response = response($view, 200);
      $response->header('Expires', 'Tue, 1 Jan 1980 00:00:00 GMT');
      $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
      $response->header('Pragma', 'no-cache');
      return $response;
    }
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
      $programas = ['VIVIENDA', 'SALUD', 'ALIMENTOS', 'EDUCACION', 'MEDIO_AMBIENTE', 'ORIENTACION_SOCIAL'];
      if (in_array(strtoupper($programa), $programas)) {
        if (Auth::guest() || Auth::user()->role == 'ROLE_ADMIN') {
          $proyectos = Proyecto::where('tipo', '=', $programa)->paginate(10);
        }
        else {
          $proyectos = Auth::User()->proyectos()->where('tipo', '=', $programa)->paginate(10);
        }
        $estado = Estado::find(21);
        return $this->noGuardarCache(view('proyectos/listaProyectos')->with('proyectos', $proyectos)->with('estado', $estado)->with('programa', $programa));
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
        return $this->noGuardarCache(view('proyectos/crearProyecto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if (!Session::has('programa')) {
        if ($response->ajax()) {
          return response()->json(['session' => 'false']);
        }
        return view('welcome');
      }
      $rules = [
          'nombre' => 'required|max:255|unique:Proyectos,nombre',
          'descripcion' => 'required|max:255',
          'tipo' => 'required',
      ];

      $validacion = Validator::make($request->all(), $rules);

      if ($validacion->fails()) {
        if ($request->ajax()) {
          return response()->json(['errors' => $validacion->errors()]);
        }
        return redirect()->back()->withInput()->withErrors($validacion->errors());
      }

      $proyecto = new Proyecto($request->all());
      $proyecto->save();
      if ($request->ajax()) {
        return response()->json(['status' => 'success']);
      }
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
        if ($proyecto) {
          return $this->noGuardarCache(view('proyectos/editarProyecto')->with('proyecto', $proyecto));
        }
        return view('welcome');
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
      if (!Session::has('programa')) {
        if ($response->ajax()) {
          return response()->json(['session' => 'false']);
        }
        return view('welcome');
      }
      $rules = [
        'descripcion' => 'required|max:255',
        'tipo' => 'required',
      ];
      $proyecto = Proyecto::find($id);
      if ($proyecto) {
        if ($proyecto->nombre != $request->nombre || $request->nombre == '') {
          $rules['nombre'] = 'required|max:255|unique:Proyectos,nombre';
        }
      }

      $validacion = Validator::make($request->all(), $rules);

      if ($validacion->fails()) {
        if ($request->ajax()) {
          return response()->json(['errors' => $validacion->errors()]);
        }
        return redirect()->back()->withInput()->withErrors($validacion->errors());
      }

      if ($proyecto) {
        $proyecto->nombre = $request->nombre;
        $proyecto->descripcion = $request->descripcion;
        $proyecto->save();
        if ($request->ajax()) {
          return response()->json(['status' => 'success']);
        }
        return redirect()->route('proyectosPorPrograma', Session::get('programa'));
      }
      return view('welcome');
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
