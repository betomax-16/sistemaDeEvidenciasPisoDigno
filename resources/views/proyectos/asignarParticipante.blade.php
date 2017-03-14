@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{asset('css/general.css')}}">
<link rel="stylesheet" href="{{asset('css/proyectos/participantes.css')}}">
<style media="screen">
  #plantilla{
    display: none;
  }
</style>
@endsection
@section('content')
<div class="container espacioPagina marco">
  <div class="row">
    <div class="col-md-12">
      <a href="{{ URL::previous() }}" class="btn green btn-circle"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
      <h1 class="text-xs-center">{{$proyecto->nombre}}</h1>
      <h3 class="text-xs-center">{{$entidad->nombre}}</h3>
      <hr>
      <div class="row">
        <div class="col-md-9">
          <h2 class="text-md-center">Participantes</h2>
          <div id="tabla" class="card">
            <div class="card-block">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead class="thead-inverse">
                    <tr>
                      <th class="text-md-center">Nombre</th>
                      <th class="text-md-center hidden-xs-down">Email</th>
                      <th class="text-md-center">Acción</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($participantes as $participante)
                    <tr id="{{$participante->idUsuario}}">
                      <td class="text-md-center">{{$participante->nombreCompleto()}}</td>
                      <td class="text-md-center hidden-xs-down">{{$participante->email}}</td>
                      <td class="text-md-center"><button class="btn red-inverse btn-delete" type="button" name="button">Eliminar</button></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              {!! Form::open(['route' => ['participante.destroy', 'ID_USUARIO', $proyecto->idProyecto], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
              {!! Form::close() !!}
              {!! $participantes->render() !!}
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <h4 class="text-md-center">Agregar Participante</h4>
          <div id="addParticipante" class="card">
            <div class="card-block">
              {!! Form::open(['route' => ['participante.store', $proyecto->idProyecto, $entidad->idEstado], 'method' => 'POST', 'id' => 'formAdd']) !!}
              <div class="form-group{{ $errors->has('idUsuario') ? ' has-danger' : '' }}">
                {!! Form::label('usuario', 'Usuario') !!}
                {!! Form::select('idUsuario', $usuarios, old('idUsuariosuario'), ['class' => 'form-control', 'id' => 'selectUsuario']) !!}
                @if ($errors->has('idUsuario'))
                    <span class="form-control-feedback">
                        <strong>{{ $errors->first('idUsuario') }}</strong>
                    </span>
                @endif
                <span class="form-control-feedback">
                    <strong id="errorselectUsuario"></strong>
                </span>
              </div>
              <div class="form-group">
                {!! Form::submit('Guardar', ['class' => 'btn green-inverse', 'style' => 'width:100%', 'id' => 'btnGuardar']) !!}
              </div>
              {!! Form::close() !!}
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
<script src="{{asset('js/Proyectos/asignarParticipante.js')}}" charset="utf-8"></script>
<script type="text/javascript">
  var token = '{{ Session::token() }}';
  var proyecto = '{{$proyecto->idProyecto}}';
</script>
<script type="text/javascript">
  $(document).ready(function () {
    $('#programas').addClass('active');
    $('#{{ strtolower($proyecto->tipo) }}').addClass('active');
  });
</script>
@endsection
