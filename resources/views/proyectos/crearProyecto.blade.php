@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{asset('css/general.css')}}">
<link rel="stylesheet" href="{{asset('css/proyectos/nuevoProyecto.css')}}">
@endsection
@section('content')
<div class="container espacioPagina marco">
    <div class="row">
        <div class="col-md-12">
          <a href="{{ URL::previous() }}" class="btn green btn-circle"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
          <h1 class="text-xs-center">Nuevo Proyecto</h1>
          <hr>
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
  $(document).ready(function () {
    $('#programas').addClass('active');
    $('#{{ strtolower(Session::get("programa")) }}').addClass('active');
  });
</script>
@endsection
