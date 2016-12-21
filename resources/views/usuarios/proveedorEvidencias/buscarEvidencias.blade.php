@extends('layouts.app') @section('styles')
<link rel="stylesheet" href="{{asset('jquery-ui/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('css/imagenes.css')}}"> @endsection @section('content')
<div class="container espacioPagina">
    <div class="row">
        <div class="col-md-12">
            @if(!Auth::guest())
            <a href="{{route('evidencia.create')}}" class="btn btn-lg btn-success" style="width:100%">Agregar Evidencia</a> @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Buscar Evidencias</h1>
                    <h4 style="display:inline"><span id='proyecto'>{{$proyecto->nombre}}</span>,  Entidad: {{$estado->nombre}}</h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-inline">
                                <div class="form-group">
                                    {!! Form::label('año', 'Año') !!} {!! Form::number('año', Carbon\Carbon::now()->format('Y'), ['id' => 'año', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form_group">
                                {!! Form::select('region', ['MUNICIPIO' => 'Municipio', 'LOCALIDAD' => 'Localidad'],'MUNICIPIO', ['class' => 'form-control', 'id' => 'region']) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                {!! Form::text('nombreLugar', $municipio ? $municipio->nombre : null, ['class' => 'form-control', 'id' => 'nombreLugar', 'placeholder' => 'Lugar...', 'autocomplete' => 'off']) !!}
                                <span class="input-group-btn">
                          <button class="btn btn-default" type="button" id="btnBuscar"><span class="glyphicon glyphicon-search"></span></button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <section class="Evidencias">

                        <header class="municipio text-xs-center" role="banner">
                            <h2>Municipio</h2>
                        </header>
                        <div class="container-fluid">
                            <div class="row" id="evidencias">

                                @if($beneficiados) @include('layouts/templates/Evidencias') @else
                                <h2>Sin evidencias</h2> @endif

                            </div>
                        </div>

                    </section>

                </div>
                {!! Form::open(['route' => ['evidencia.destroy', 'ID_HOGAR'], 'method' => 'DELETE', 'id' => 'form-delete']) !!} {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection @section('javascripts')
<script type="text/javascript" src="{{asset('jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/Evidencias/buscarLocalidadEvidencia.js')}}"></script>
<script type="text/javascript" src="{{asset('js/Evidencias/eliminarEvidencia.js')}}"></script>
<script type="text/javascript">
    var token = '{{ Session::token() }}';
    var estado = '{{ Session::get("estado") }}';
    var proyecto = '{{ Session::get("proyecto") }}';

</script>
@endsection
