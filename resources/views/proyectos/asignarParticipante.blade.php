@extends('layouts.app')
@section('styles')

@endsection
@section('content')
<div class="container espacioPagina">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12">
              <h1>{{$proyecto->nombre}}</h1>
              <h3>{{$proyecto->tipo.' '.$entidad->nombre}}</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-md-9">
              <h2 class="text-center">Participantes</h2>
              <div class="panel panel-default">
                <div class="panel-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($participantes as $participante)
                      <tr id="{{$participante->idUsuario}}">
                        <td>{{$participante->nombreCompleto()}}</td>
                        <td>{{$participante->email}}</td>
                        <td><button class="btn btn-danger btn-delete" type="button" name="button">Eliminar</button></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {!! Form::open(['route' => ['participante.destroy', 'ID_USUARIO', $proyecto->nombre], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
                  {!! Form::close() !!}
                  {!! $participantes->render() !!}
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <h2 class="text-center">Agregar Participante</h2>
              <div class="panel panel-default">
                <div class="panel-body">
                  {!! Form::open(['route' => ['participante.store', $proyecto->nombre, $entidad->idEstado], 'method' => 'POST']) !!}
                  <div class="form-group{{ $errors->has('idUsuario') ? ' has-error' : '' }}">
                    {!! Form::label('usuario', 'Usuario') !!}
                    {!! Form::select('idUsuario', $usuarios, old('uidUsuariosuario'), ['class' => 'form-control', 'id' => 'selectUsuario']) !!}
                    @if ($errors->has('idUsuario'))
                        <span class="help-block">
                            <strong>{{ $errors->first('idUsuario') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
                  </div>
                  {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('javascripts')
<script type="text/javascript" src="{{asset('js/Usuarios/deleteParticipante.js')}}"></script>
<script type="text/javascript">
  var token = '{{ Session::token() }}';
  var proyecto = '{{$proyecto->nombre}}';
</script>
@endsection
