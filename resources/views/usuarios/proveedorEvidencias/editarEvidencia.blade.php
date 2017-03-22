@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{asset('jquery-ui/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('css/general.css')}}">
<link rel="stylesheet" href="{{asset('css/evidencias/agregar.css')}}">
<link rel="stylesheet" href="{{asset('css/dropzone.css')}}">
<style media="screen">
  .dz-image{
    display: flex !important;
    justify-content: center;
  }
  .dz-image img{
    max-width: 100%;
    height: 120px;
  }
  .addImage{
    width: 120px;
    height: 120px;
    border: 3px dashed;
    border-radius: 10px;
    text-align: center;
    padding-top: 4.5%;
    font-size: 25px;
    cursor:pointer;
  }
  .addImage:hover{
    border-color: rgb(194, 194, 194);
    color: rgb(121, 121, 121);
  }
  .ui-accordion .ui-accordion-content{
    height: inherit !important;
  }
  .dropzone{
    /*display: flex;*/
  }
  .dropzone .dz-message{
    margin: 0;
  }
  #windowLoad{
    position:fixed;
    top:0px;
    left:0px;
    z-index:3200;
    filter:alpha(opacity=65);
   -moz-opacity:65;
    opacity:0.65;
    background:#999;
  }
</style>
@endsection
@section('content')
<div class="container espacioPagina marco">
    <div class="row">
        <div class="col-md-12">
          <a href="{{ URL::previous() }}" class="btn green btn-circle"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
          <h1 class="text-xs-center">Editar Evidencia Para: <span>{{App\Proyecto::find(Session::get('proyecto'))->nombre}}</span></h1>
          <hr>
          {!! Form::open(['route' => ['evidencia.update', $beneficiado->idHogar], 'method' => 'PUT', 'files' => true]) !!}
          <div class="row">
            <div class="col-md-6">
              <div class="form-group{{ $errors->has('idMunicipio') ? ' has-danger' : '' }}">
                {!! Form::label('municipio', 'Municipio') !!}
                {!! Form::text('municipio', old('municipio') ? old('municipio') : $municipio->nombre, ['placeholder' => 'Municipio...', 'id' => 'municipio', 'class' => 'form-control', 'autocomplete' => 'off']) !!}
                {!! Form::hidden('idMunicipio', old('idMunicipio') ? old('idMunicipio') : $municipio->idMunicipio, ['id' => 'idMunicipio']) !!}
                @if ($errors->has('idMunicipio') || $errors->has('municipio'))
                    <span class="form-control-feedback">
                        <strong>{{ $errors->first('idMunicipio') }}</strong>
                    </span>
                @endif
                <span class="form-control-feedback">
                    <strong id="errormunicipio"></strong>
                </span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group{{ $errors->has('idLocalidad') ? ' has-danger' : '' }}">
                {!! Form::label('localidad', 'Localidad') !!}
                {!! Form::text('localidad', old('localidad') ? old('localidad') : $localidad->nombre, ['placeholder' => 'Localidad...', 'id' => 'localidad', 'class' => 'form-control', 'autocomplete' => 'off']) !!}
                {!! Form::hidden('idLocalidad', old('idLocalidad') ? old('idLocalidad') : $localidad->idLocalidad, ['id' => 'idLocalidad']) !!}
                @if ($errors->has('idLocalidad') || $errors->has('localidad'))
                    <span class="form-control-feedback">
                        <strong>{{ $errors->first('idLocalidad') }}</strong>
                    </span>
                @endif
                <span class="form-control-feedback">
                    <strong id="errorlocalidad"></strong>
                </span>
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group{{ $errors->has('familia') ? ' has-danger' : '' }}">
                {!! Form::label('familia', 'Familia') !!}
                {!! Form::text('familia', old('familia') ? old('familia') : $beneficiado->familia, ['placeholder' => 'Familia...', 'id' => 'familia', 'class' => 'form-control', 'autocomplete' => 'off']) !!}
                @if ($errors->has('familia'))
                    <span class="form-control-feedback">
                        <strong>{{ $errors->first('familia') }}</strong>
                    </span>
                @endif
                <span class="form-control-feedback">
                    <strong id="errorfamilia"></strong>
                </span>
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <div id="acordion">
                <h3>Foto 1</h3>
                <div class="row">
                  <div class="col-md-12">
                    <div id="dropzoneFileUpload1" class="dropzone">
                      <div id="addImage1" class="addImage dz-preview dz-image-preview">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <h3>Foto 2</h3>
                <div class="row">
                  <div class="col-md-12">
                    <div id="dropzoneFileUpload2" class="dropzone">
                      <div id="addImage2" class="addImage dz-preview dz-image-preview">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <h3>Foto 3</h3>
                <div class="row">
                  <div class="col-md-12">
                    <div id="dropzoneFileUpload3" class="dropzone">
                      <div id="addImage3" class="addImage dz-preview dz-image-preview">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <h3>Otras fotos</h3>
                <div class="row">
                  <div class="col-md-12">
                    <div id="dropzoneFileUpload4" class="dropzone">
                      <div id="addImage4" class="addImage dz-preview dz-image-preview">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <button id="btnGuardar" type="submit" class="btn green-inverse circle" style="width:100%"><i class="fa fa-share" aria-hidden="true"></i> Guardar</button>
            </div>
          </div>
          {!! Form::close() !!}
        </div>
    </div>
</div>
<div id="fotos" style="display:none">
  {{json_encode($fotos)}}
</div>
@endsection
@section('javascripts')
<script type="text/javascript" src="{{asset('js/dropzone.js')}}"></script>
<script type="text/javascript" src="{{asset('jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/Evidencias/actualizarEvidencia.js')}}"></script>
<script type="text/javascript">
  var token = '{{ Session::token() }}';
  var urlSave = '{{route("evidencia.addImage")}}';
  var urlDelete = '{{route("evidencia.removeImage")}}';
  var urlSaveRecordig = '{{route("evidencia.update", $beneficiado->idHogar)}}';
  var urlLoading = '{{asset("imagenes/aplicacion/loading.gif")}}';
  var urlImagenes = '{{asset("imagenes/evidencias")}}';
  var fotosTxt = $('#fotos').html();
  var idHogar = '{{$beneficiado->idHogar}}';
  var redirect = '{{route("evidencia.evidencias", [Session::get("proyecto"), $municipio->idEstado])}}';
  //arreglo de fotos
  var fotosObject = JSON.parse(fotosTxt);
</script>
<script type="text/javascript">
  $(document).ready(function () {
    $('#programas').addClass('active');
    $('#{{ strtolower(App\Proyecto::find(Session::get("proyecto"))->tipo) }}').addClass('active');
  });
</script>
@endsection
