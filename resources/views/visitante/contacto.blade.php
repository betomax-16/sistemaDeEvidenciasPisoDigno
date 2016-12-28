@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{asset('css/general.css')}}">
<link rel="stylesheet" href="{{asset('css/contactanos.css')}}">
@endsection
@section('content')
<div class="paginas-internas  ">
    <div class="texto-encabezado text-xs-center bienvenidos">
        <div class="container">
            <h1 class="display-4 wow bounceIn">Contacto</h1>
            <p class="wow bounceIn" data-wow-delay=".3s">Estamos listos para ayudar</p>
        </div>
    </div>
    </section>
    <section class="ruta p-2">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-xs-right">
                </div>
            </div>
        </div>
    </section>
    <main class="p-1">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="m-b-2">Formulario de contacto</h2>
                    {!! Form::open(['route' => 'enviarContacto', 'method' => 'POST']) !!}
                    <div class="form-group row{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                        {!! Form::label('nombre', 'Nombre', ['class' => 'col-md-4 col-form-label']) !!}
                        <div class="col-md-8">
                          {!! Form::text('nombre', old('nombre'), ['class' => 'form-control', 'placeholder' => 'Ingrese su nombre', 'id' => 'nombre', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Ingrese su nombre completo', 'autocomplete' => 'off']) !!}
                          @if ($errors->has('nombre'))
                              <span class="form-control-feedback">
                                  <strong>{{ $errors->first('nombre') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>
                    <div class="form-group row{{ $errors->has('email') ? ' has-danger' : '' }}">
                        {!! Form::label('email', 'Email', ['class' => 'col-md-4 col-form-label']) !!}
                        <div class="col-md-8">
                          {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Ingrese su email', 'id' => 'email', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Ingrese su email', 'autocomplete' => 'off']) !!}
                          @if ($errors->has('email'))
                              <span class="form-control-feedback">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>
                    <div class="form-group row{{ $errors->has('mensaje') ? ' has-danger' : '' }}">
                        {!! Form::label('mensaje', 'Mensaje', ['class' => 'col-md-4 col-form-label']) !!}
                        <div class="col-md-8">
                          {!! Form::textarea('mensaje', old('mensaje'), ['class' => 'form-control', 'placeholder' => 'Ingrese su mensaje', 'id' => 'mensaje', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Ingrese un mensaje', 'autocomplete' => 'off']) !!}
                          @if ($errors->has('mensaje'))
                              <span class="form-control-feedback">
                                  <strong>{{ $errors->first('mensaje') }}</strong>
                              </span>
                          @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-8 offset-md-4">
                            {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
                            {!! Form::reset('Limpiar', ['class' => 'btn btn-secondary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="col-md-4">
                    <h3>Detalles de contacto</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque laborum commodi suscipit vitae eius perferendis consequuntur? Modi nihil aliquam, quas deserunt vitae atque suscipit ratione rerum eveniet. Qui, adipisci ad.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque laborum commodi suscipit vitae eius perferendis consequuntur? Modi nihil aliquam, quas deserunt vitae atque suscipit ratione rerum eveniet. Qui, adipisci ad.</p>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
@section('javascripts')
@endsection
