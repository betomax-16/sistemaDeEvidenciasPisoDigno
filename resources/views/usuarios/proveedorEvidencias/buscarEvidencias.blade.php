@extends('layouts.app') @section('styles')
<link rel="stylesheet" href="{{asset('jquery-ui/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('css/evidencia.css')}}">
<link rel="stylesheet" href="{{asset('css/general.css')}}">
@endsection @section('content')
<div class="container espacioPagina">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Buscar Evidencias</h1>
                    <h4 style="display:inline"><span id='proyecto'>{{$proyecto->nombre}}</span>,  Entidad: {{$estado->nombre}}</h4>
                </div>
                @if(!Auth::guest())
                <a href="{{route('evidencia.create')}}" class="btn btn-lg btn-success" style="width:100%">Agregar Evidencia</a> @endif
                <div class="card-block">
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
                                  <button class="btn btn-secondary" type="button" id="btnBuscar"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="container" id="evidencias">
                      @if($beneficiados) @include('layouts/templates/evidencias') @else
                      <h1 class="display-4 text-md-center">Sin evidencias</h1> @endif
                    </div>
                </div>
                {!! Form::open(['route' => ['evidencia.destroy', 'ID_HOGAR'], 'method' => 'DELETE', 'id' => 'form-delete']) !!} {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <center><img id="foto-modal" src="#" class="img-thumbnail img-responsive"></img></center>
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
