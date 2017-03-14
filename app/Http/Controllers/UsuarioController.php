<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Usuario;
use Validator;

class UsuarioController extends Controller
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
        $usuarios = Usuario::paginate(10);
        return $this->noGuardarCache(view('usuarios/administrado/listaUsuarios')->with('usuarios', $usuarios));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->noGuardarCache(view('usuarios/administrado/agregarUsuarios'));
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
          'nombre' => 'required|max:255',
          'apellidoPaterno' => 'required|max:255',
          'apellidoMaterno' => 'required|max:255',
          'email' => 'required|email|max:255|unique:Usuarios',
          'password' => 'required|min:6|confirmed',
      ];
      $validacion = Validator::make($request->all(), $rules);

      if ($validacion->fails()) {
        return redirect()->back()->withInput()->withErrors($validacion->errors());
      }

      $usuario = new Usuario();
      $usuario->nombre = $request->nombre;
      $usuario->apellidoPaterno = $request->apellidoPaterno;
      $usuario->apellidoMaterno = $request->apellidoMaterno;
      $usuario->email = $request->email;
      $usuario->password = bcrypt($request->password);
      $usuario->role = $request->role;
      $usuario->save();
      return redirect()->route('usuario.index');
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
        $usuario = Usuario::find($id);
        if ($usuario) {
          return $this->noGuardarCache(view('usuarios/administrado/editarUsuario')->with('usuario', $usuario));
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
      $rules = [
          'nombre' => 'required|max:255',
          'apellidoPaterno' => 'required|max:255',
          'apellidoMaterno' => 'required|max:255',
      ];

      $usuario = Usuario::find($id);
      if ($usuario) {
        if ($usuario->email != $request->email) {
          $rules['email'] = 'required|email|max:255|unique:Usuarios';
          $usuario->email = $request->email;
        }
        if ($request->password != '') {
          $rules['password'] = 'required|min:6|confirmed';
          $usuario->password = bcrypt($request->password);
        }
        $validacion = Validator::make($request->all(), $rules);

        if ($validacion->fails()) {
          return redirect()->back()->withInput()->withErrors($validacion->errors());
        }

        $usuario->nombre = $request->nombre;
        $usuario->apellidoPaterno = $request->apellidoPaterno;
        $usuario->apellidoMaterno = $request->apellidoMaterno;
        $usuario->role = $request->role;
        $usuario->save();
        return redirect()->route('usuario.index');
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
        $usuario = Usuario::find($id);
        $usuario->delete();
        return response()->json([
          'message' =>  'Usuario eliminado exitosamente.'
        ]);
      }
    }
}
