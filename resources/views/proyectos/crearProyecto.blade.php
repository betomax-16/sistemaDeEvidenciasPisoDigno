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
                  <h1>Nuevo Proyecto</h1>
                </div>
                <div class="card-block">
                  {!! Form::open(['route' => 'proyecto.store', 'method' => 'POST']) !!}
                  <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                    {!! Form::label('nombre', 'Proyecto') !!}
                    {!! Form::text('nombre', old('nombre'), ['class' => 'form-control', 'placeholder' => 'Nombre de proyecto...', 'autocomplete' => 'off']) !!}
                    {!! Form::hidden('tipo', Session::get('programa')) !!}
                    @if ($errors->has('nombre'))
                        <span class="form-control-feedback">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-success btn-lg', 'style' => 'width:100%']) !!}
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
