@extends('layouts.app')
@section('styles')

@endsection
@section('content')
<div class="container espacioPagina">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h1>Editar Proyecto</h1>
                </div>
                <div class="panel-body">
                  {!! Form::model($proyecto, ['route' => ['proyecto.update', $proyecto->nombre], 'method' => 'PUT', 'id' => 'form-edit']) !!}
                  <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                    {!! Form::label('nombre', 'Proyecto') !!}
                    {!! Form::text('nombre', old('nombre'), ['class' => 'form-control', 'placeholder' => 'Nombre de proyecto...', 'autocomplete' => 'off']) !!}
                    {!! Form::hidden('tipo', Session::get('programa')) !!}
                    @if ($errors->has('nombre'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-success btn-lg', 'id' => 'btnGuardar']) !!}
                  </div>
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascripts')
<script type="text/javascript" src="{{asset('js/bootbox.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/Proyectos/updateProyecto.js')}}"></script>
@endsection
