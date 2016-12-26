@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{asset('css/general.css')}}">
@endsection
@section('content')
<div class="container espacioPagina">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h1>Usuarios</h1>
                </div>
                <div class="card-block">
                  <a class="btn btn-success btn-lg" href="{{route('usuario.create')}}" style="width:100%">Agregar Usuario</a>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="thead-inverse">
                        <tr>
                          <th class="text-md-center">Nombre</th>
                          <th class="text-md-center hidden-xs-down">Email</th>
                          <th class="text-md-center hidden-xs-down">Rol</th>
                          <th class="text-md-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($usuarios as $usuario)
                          <tr id="{{$usuario->idUsuario}}">
                            <td class="text-md-center">{{$usuario->nombreCompleto()}}</td>
                            <td class="text-md-center hidden-xs-down">{{$usuario->email}}</td>
                            @if($usuario->role == 'ROLE_ADMIN')
                            <td class="text-md-center hidden-xs-down"><h5><span class="tag tag-pill tag-success">Administrador</span></h5></td>
                            @elseif($usuario->role == 'ROLE_PROVIDER')
                            <td class="text-md-center hidden-xs-down"><h5><span class="tag tag-pill tag-info">Proveedor de evidencias</span></h5></td>
                            @endif
                            <td class="text-md-center">
                              <div class="btn-group">
                                <a class="btn btn-info btn-secundary" href="{{route('usuario.edit', $usuario->idUsuario)}}">Editar</a>
                                <button type="button" name="button" class="btn btn-danger btn-secundary btn-delete">Eliminar</button>
                              </div>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  {!! Form::open(['route' => ['usuario.destroy', 'ID_USUARIO'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
                  {!! Form::close() !!}
                  {{ $usuarios->links() }}
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
