<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estado;
use App\Proyecto;
use App\Usuario;
use Validator;

class ParticipanteController extends Controller
{
    private function usuariosSeleccionables(Proyecto $project)
    {
      return Usuario::leftJoin('usuarios_proyectos', 'usuarios_proyectos.idUsuario', '=', 'usuarios.idUsuario')
                         ->select('usuarios.*')
                         ->whereNull('usuarios_proyectos.idUsuario')
                         ->where('usuarios.role', '=', 'ROLE_PROVIDER')
                         ->orWhere('usuarios_proyectos.proyecto', '<>', $project->nombre)
                         ->groupBy('usuarios.idUsuario')
                         ->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($proyecto, $idEstado)
    {
        $project = Proyecto::find($proyecto);
        $estado = Estado::find($idEstado);
        $participantes = $project->miembros()->where('role', '=', 'ROLE_PROVIDER')->paginate(10);
        $usuarios = $this->usuariosSeleccionables($project);
        $aux = array('' => 'Selecciona un usuario');
        foreach ($usuarios as $usuario) {
          $aux[$usuario->idUsuario] = $usuario->nombreCompleto();
        }
        return view('proyectos/asignarParticipante')
                ->with('proyecto', $project)
                ->with('entidad', $estado)
                ->with('participantes', $participantes)
                ->with('usuarios', $aux);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $proyecto, $idEstado)
    {
      $rules = [
          'idUsuario' => 'required|exists:Usuarios',
      ];

      $validacion = Validator::make($request->all(), $rules);

      if ($validacion->fails()) {
        return redirect()->back()->withInput()->withErrors($validacion->errors());
      }

      $usuario = Usuario::find($request->idUsuario);
      $usuario->proyectos()->attach($proyecto);
      return redirect()->route('participante.index', [$proyecto, $idEstado]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $idUsuario, $proyecto)
    {
        if ($request->ajax()) {
          $usuario = Usuario::find($idUsuario);
          $usuario->proyectos()->detach($proyecto);
          return response()->json([
            'message' => 'Usuario eliminado exitoamente.'
          ]);
        }
    }

    public function seleccionarUsuarios(Request $request, $proyecto)
    {
        if($request->ajax()){
          $usuarios = $this->usuariosSeleccionables(Proyecto::find($proyecto));
          $text = '<option value="">Selecciona un usuario</option>';
          foreach ($usuarios as $usuario) {
            $text .= '<option value="'.$usuario->idUsuario.'">'.$usuario->nombreCompleto().'</option>';
          }
          return $text;
        }
    }
}
