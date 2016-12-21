@extends('layouts.app')
@section('styles')

@endsection
@section('content')
<div class="container espacioPagina">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h1>Contacto</h1>
                </div>
                <div class="panel-body">
                  {!! Form::open(['route' => 'enviarContacto', 'method' => 'POST']) !!}
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre...', 'autocomplete' => 'off']) !!}
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email...', 'autocomplete' => 'off']) !!}
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        {!! Form::textarea('mensaje', null, ['class' => 'form-control', 'placeholder' => 'Mensaje...']) !!}
                      </div>
                      <div class="form-group">
                        {!! Form::submit('Enviar', ['class' => 'btn btn-success btn-lg']) !!}
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
