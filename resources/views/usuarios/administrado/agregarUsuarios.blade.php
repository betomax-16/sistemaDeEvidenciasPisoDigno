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
                  <div class="row">
                    <div class="col-xs-3 col-sm-2 col-md-1">
                      <a href="{{ URL::previous() }}" class="btn green btn-circle"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    </div>
                    <div class="col-xs-9 col-sm-10 col-md-11">
                      <h1>Agregar Usuario</h1>
                    </div>
                  </div>
                </div>
                <div class="card-block">
                  {!! Form::open(['route' => 'usuario.store', 'method' => 'POST']) !!}
                  <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                    {!! Form::label('nombre', 'Nombre') !!}
                    {!! Form::text('nombre', old('nombre'), ['class' => 'form-control', 'placeholder' => 'Nombre...', 'autocomplete' => 'off']) !!}
                    @if ($errors->has('nombre'))
                        <span class="form-control-feedback">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group{{ $errors->has('apellidoPaterno') ? ' has-danger' : '' }}">
                    {!! Form::label('apellidoPaterno', 'Apellido Paterno') !!}
                    {!! Form::text('apellidoPaterno', old('apellidoPaterno'), ['class' => 'form-control', 'placeholder' => 'Apellido Paterno...', 'autocomplete' => 'off']) !!}
                    @if ($errors->has('apellidoPaterno'))
                        <span class="form-control-feedback">
                            <strong>{{ $errors->first('apellidoPaterno') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group{{ $errors->has('apellidoMaterno') ? ' has-danger' : '' }}">
                    {!! Form::label('apellidoMaterno', 'Apellido Materno') !!}
                    {!! Form::text('apellidoMaterno', old('apellidoMaterno'), ['class' => 'form-control', 'placeholder' => 'Apellido Materno...', 'autocomplete' => 'off']) !!}
                    @if ($errors->has('apellidoMaterno'))
                        <span class="form-control-feedback">
                            <strong>{{ $errors->first('apellidoMaterno') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Email...', 'autocomplete' => 'off']) !!}
                    @if ($errors->has('email'))
                        <span class="form-control-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                    {!! Form::label('password', 'Contraseña') !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña...', 'autocomplete' => 'off']) !!}
                    @if ($errors->has('password'))
                        <span class="form-control-feedback">
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
                    {!! Form::select('role', ['ROLE_PROVIDER' => 'Proveedor de Evidencias', 'ROLE_ADMIN' => 'Administrador'], 'ROLE_PROVIDER', ['class' => 'form-control']) !!}
                  </div>
                  <hr>
                  <div class="form-group">
                    {!! Form::submit('Guardar', ['class' => 'btn green-inverse btn-lg', 'style' => 'width:100%']) !!}
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
