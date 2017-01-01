@extends('layouts.app') @section('styles')
<link rel="stylesheet" href="{{asset('jquery-ui/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('css/evidencia.css')}}">
<link rel="stylesheet" href="{{asset('css/general.css')}}">
<link rel="stylesheet" href="{{asset('css/set1.css')}}">
<link rel="stylesheet" href="{{asset('css/cs-select.css')}}">
<link rel="stylesheet" href="{{asset('css/cs-skin-underline.css')}}">@endsection @section('content')
<div class="container-fluid espacioPagina">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h1>Buscar Evidencias</h1>
                  <h4 style="display:inline"><span id='proyecto'>{{$proyecto->nombre}}</span>,  Entidad: {{$estado->nombre}}</h4>
                </div>
                @if(!Auth::guest())
                <a href="{{route('evidencia.create')}}" class="btn green-inverse" style="width:100%">Agregar Evidencia</a> @endif
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-4 " style="padding:5px">
                          <div class="row">
                            <div class="col-md-3">
                              <a href="#" id="btnExcel" class="btn green-inverse" style="margin-top: 19px;"><i class="fa fa-download" aria-hidden="true"></i> Excel</a>                              
                            </div>
                            <div class="col-md-9">
                              <span class="input input--hoshi">
                                {!! Form::number('año', Carbon\Carbon::now()->format('Y'), ['id' => 'año', 'class' => 'input__field input__field--hoshi']) !!}
                  					    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  						    <span class="input__label-content arriba">Año</span>
                                </label>
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4" style="padding:5px">
                            {!! Form::select('region', ['MUNICIPIO' => 'Municipio', 'LOCALIDAD' => 'Localidad'],'MUNICIPIO', ['class' => 'cs-select cs-skin-underline', 'id' => 'region', 'style' => 'display:none;']) !!}
                        </div>
                        <div class="col-md-4  " style="padding:5px">
                          <span class="input input--hoshi">
                            {!! Form::text('nombreLugar', $municipio ? $municipio->nombre : null, ['class' => 'input__field input__field--hoshi', 'id' => 'nombreLugar', 'autocomplete' => 'off']) !!}
              					    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
              						    <span class="input__label-content input__label-content--hoshi">Lugar</span>
                            </label>
                          </span>
                        </div>
                    </div>
                    <hr>
                    <div class="container-fliud" id="evidencias">
                        @if($beneficiados) @include('layouts/templates/Evidencias') @else
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
                <center><img id="foto-modal" src="#" class="img-thumbnail img-responsive"></img>
                </center>
            </div>
        </div>
    </div>
</div>
@endsection @section('javascripts')
<script type="text/javascript" src="{{asset('jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/Contacto/Hoshi.js')}}"></script>
<script type="text/javascript" src="{{asset('js/select/classie.js')}}"></script>
<script type="text/javascript" src="{{asset('js/select/selectFx.js')}}"></script>
<script type="text/javascript" src="{{asset('js/Evidencias/buscarLocalidadEvidencia.js')}}"></script>
<script type="text/javascript" src="{{asset('js/Evidencias/eliminarEvidencia.js')}}"></script>
<script type="text/javascript">
    var token = '{{ Session::token() }}';
    var estado = '{{ Session::get("estado") }}';
    var proyecto = '{{ Session::get("proyecto") }}';
    var download = "{{route('evidencia.excel',['PROYECTO','ANIO','REGION','LUGAR'])}}";
</script>
@endsection
