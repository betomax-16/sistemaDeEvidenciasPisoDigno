@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{asset('css/general.css')}}">
<link rel="stylesheet" href="{{asset('css/usuarios/usuarios.css')}}">
@endsection
@section('content')
<div class="container espacioPagina marco">
    <div class="row">
        <div class="col-md-12">
          <a href="{{ URL::previous() }}" class="btn green btn-circle"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
          <h1 class="text-xs-center">Agregar Usuario</h1>
          <hr>
          {!! Form::open(['route' => 'usuario.store', 'method' => 'POST', 'id' => 'form-add']) !!}
          <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
            {!! Form::label('nombre', 'Nombre') !!}
            {!! Form::text('nombre', old('nombre'), ['class' => 'form-control', 'placeholder' => 'Nombre...', 'autocomplete' => 'off']) !!}
            @if ($errors->has('nombre'))
                <span class="form-control-feedback">
                    <strong>{{ $errors->first('nombre') }}</strong>
                </span>
            @endif
            <span class="form-control-feedback">
                <strong id="errornombre"></strong>
            </span>
          </div>
          <div class="form-group{{ $errors->has('apellidoPaterno') ? ' has-danger' : '' }}">
            {!! Form::label('apellidoPaterno', 'Apellido Paterno') !!}
            {!! Form::text('apellidoPaterno', old('apellidoPaterno'), ['class' => 'form-control', 'placeholder' => 'Apellido Paterno...', 'autocomplete' => 'off']) !!}
            @if ($errors->has('apellidoPaterno'))
                <span class="form-control-feedback">
                    <strong>{{ $errors->first('apellidoPaterno') }}</strong>
                </span>
            @endif
            <span class="form-control-feedback">
                <strong id="errorapellidoPaterno"></strong>
            </span>
          </div>
          <div class="form-group{{ $errors->has('apellidoMaterno') ? ' has-danger' : '' }}">
            {!! Form::label('apellidoMaterno', 'Apellido Materno') !!}
            {!! Form::text('apellidoMaterno', old('apellidoMaterno'), ['class' => 'form-control', 'placeholder' => 'Apellido Materno...', 'autocomplete' => 'off']) !!}
            @if ($errors->has('apellidoMaterno'))
                <span class="form-control-feedback">
                    <strong>{{ $errors->first('apellidoMaterno') }}</strong>
                </span>
            @endif
            <span class="form-control-feedback">
                <strong id="errorapellidoMaterno"></strong>
            </span>
          </div>
          <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Email...', 'autocomplete' => 'off']) !!}
            @if ($errors->has('email'))
                <span class="form-control-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <span class="form-control-feedback">
                <strong id="erroremail"></strong>
            </span>
          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
            {!! Form::label('password', 'Contraseña') !!}
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña...', 'autocomplete' => 'off']) !!}
            @if ($errors->has('password'))
                <span class="form-control-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <span class="form-control-feedback">
                <strong id="errorpassword"></strong>
            </span>
          </div>
          <div class="form-group">
            {!! Form::label('password', 'Confirmar contraseña') !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Contraseña...', 'autocomplete' => 'off', 'id' => 'password_confirmation']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('role', 'Rol') !!}
            {!! Form::select('role', ['ROLE_PROVIDER' => 'Proveedor de Evidencias', 'ROLE_ADMIN' => 'Administrador'], 'ROLE_PROVIDER', ['class' => 'form-control']) !!}
          </div>
          <hr>
          <div class="">
            <button id="btnGuardar" type="submit" class="btn green-inverse circle" style="width:100%"><i class="fa fa-share" aria-hidden="true"></i> Guardar</button>
          </div>
          {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@section('javascripts')
<script type="text/javascript">
  var token = '{{ Session::token() }}';
  var redirect = '{{route("usuario.index")}}';
</script>
<script type="text/javascript" src="{{asset('js/Usuarios/addUsuario.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $('#usuarios').addClass('active');
  });
</script>
@endsection
