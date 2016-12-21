@extends('layouts.app')
@section('styles')

@endsection
@section('content')
<div class="container espacioPagina">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h1>Editar Usuario</h1>
                </div>
                <div class="panel-body">
                  {!! Form::model($usuario, ['route' => ['usuario.update', $usuario->idUsuario], 'method' => 'PUT']) !!}
                  <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                    {!! Form::label('nombre', 'Nombre') !!}
                    {!! Form::text('nombre', old('nombre'), ['class' => 'form-control', 'placeholder' => 'Nombre...', 'autocomplete' => 'off']) !!}
                    @if ($errors->has('nombre'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group{{ $errors->has('apellidoPaterno') ? ' has-error' : '' }}">
                    {!! Form::label('apellidoPaterno', 'Apellido Paterno') !!}
                    {!! Form::text('apellidoPaterno', old('apellidoPaterno'), ['class' => 'form-control', 'placeholder' => 'Apellido Paterno...', 'autocomplete' => 'off']) !!}
                    @if ($errors->has('apellidoPaterno'))
                        <span class="help-block">
                            <strong>{{ $errors->first('apellidoPaterno') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group{{ $errors->has('apellidoMaterno') ? ' has-error' : '' }}">
                    {!! Form::label('apellidoMaterno', 'Apellido Materno') !!}
                    {!! Form::text('apellidoMaterno', old('apellidoMaterno'), ['class' => 'form-control', 'placeholder' => 'Apellido Materno...', 'autocomplete' => 'off']) !!}
                    @if ($errors->has('apellidoMaterno'))
                        <span class="help-block">
                            <strong>{{ $errors->first('apellidoMaterno') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Email...', 'autocomplete' => 'off']) !!}
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    {!! Form::label('password', 'Contraseña') !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña...', 'autocomplete' => 'off']) !!}
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group">
                    {!! Form::label('password', 'Confirmar contraseña') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Contraseña...', 'autocomplete' => 'off']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('role', 'Rol') !!}
                    {!! Form::select('role', ['ROLE_PROVIDER' => 'Proveedor de Evidencias', 'ROLE_ADMIN' => 'Administrador'], null, ['class' => 'form-control']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-success btn-lg']) !!}
                  </div>
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascripts')

@endsection