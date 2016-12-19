@extends('layouts.app')
@section('styles')

@endsection
@section('content')
<div class="container espacioPagina">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h1>Usuarios</h1>
                </div>
                <div class="panel-body">
                  <a class="btn btn-success btn-lg" href="{{route('usuario.create')}}">Agregar Usuario</a>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Rol</th>
                        <th class="text-center">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($usuarios as $usuario)
                        <tr id="{{$usuario->idUsuario}}">
                          <td class="text-center">{{$usuario->nombreCompleto()}}</td>
                          <td class="text-center">{{$usuario->email}}</td>
                          <td class="text-center">{{$usuario->role}}</td>
                          <td class="text-center">
                            <a class="btn btn-info" href="{{route('usuario.edit', $usuario->idUsuario)}}">Editar</a>
                            <button type="button" name="button" class="btn btn-danger btn-delete">Eliminar</button>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {!! Form::open(['route' => ['usuario.destroy', 'ID_USUARIO'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascripts')
<script type="text/javascript" src="{{asset('js/bootbox.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/Usuarios/deleteUsuario.js')}}"></script>
@endsection
