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
                  <h1>Contacto</h1>
                </div>
                <div class="card-block">
                  {!! Form::open(['route' => 'enviarContacto', 'method' => 'POST']) !!}
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                        {!! Form::text('nombre', old('nombre'), ['class' => 'form-control', 'placeholder' => 'Nombre...', 'autocomplete' => 'off']) !!}
                        @if ($errors->has('nombre'))
                            <span class="form-control-feedback">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Email...', 'autocomplete' => 'off']) !!}
                        @if ($errors->has('email'))
                            <span class="form-control-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group{{ $errors->has('mensaje') ? ' has-danger' : '' }}">
                        {!! Form::textarea('mensaje', old('mensaje'), ['class' => 'form-control', 'placeholder' => 'Mensaje...']) !!}
                        @if ($errors->has('mensaje'))
                            <span class="form-control-feedback">
                                <strong>{{ $errors->first('mensaje') }}</strong>
                            </span>
                        @endif
                      </div>
                      <hr>
                      <div class="form-group">
                        {!! Form::submit('Enviar', ['class' => 'btn btn-success btn-lg', 'style' => 'width:100%']) !!}
                      </div>
                    </div>
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
