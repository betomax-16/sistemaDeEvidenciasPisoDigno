@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{asset('jquery-ui/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('css/imagenCerrar.css')}}">
<link rel="stylesheet" href="{{asset('css/general.css')}}">
@endsection
@section('content')
<div class="container espacioPagina">
    <div class="row">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-xs-3 col-sm-2 col-md-1">
                      <a href="{{ URL::previous() }}" class="btn green btn-circle"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    </div>
                    <div class="col-xs-9 col-sm-10 col-md-11">
                      <h1>Editar Evidencia {{Session::get('proyecto')}}</h1>
                    </div>
                  </div>
                </div>
                <div class="card-block">
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
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group{{ $errors->has('idLocalidad') ? ' has-danger' : '' }}">
                        {!! Form::label('localidad', 'Localidad') !!}
                        {!! Form::text('localidad', old('localidad') ? old('localidad') : $localidad->nombre, ['placeholder' => 'Localidad...', 'id' => 'localidad', 'class' => 'form-control', 'autocomplete' => 'off', 'disabled']) !!}
                        {!! Form::hidden('idLocalidad', old('idLocalidad') ? old('idLocalidad') : $localidad->idLocalidad, ['id' => 'idLocalidad']) !!}
                        @if ($errors->has('idLocalidad') || $errors->has('localidad'))
                            <span class="form-control-feedback">
                                <strong>{{ $errors->first('idLocalidad') }}</strong>
                            </span>
                        @endif
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
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-12">
                      <div id="acordion">
                        <h3>Foto 1</h3>
                        <div class="row">
                          <div class="col-md-12 {{ $errors->has('foto1') ? ' has-danger' : '' }}">
                            @php($existe = false)
                            @foreach($fotos as $foto)
                              @if($foto->tipo == 'PISO_ORIGINAL')
                                <center><img class="img-thumbnail img-fluid box" src="{{asset('imagenes/evidencias/').'/'.$foto->nombreArchivo}}" alt="" id="img1"></center>
                                @php($existe = true)
                              @endif
                            @endforeach
                            @if(!$existe)
                              <center><img class="img-thumbnail img-fluid box" src="{{asset('imagenes/evidencias/foto.png')}}" alt="" id="img1"></center>
                            @endif
                            {!! Form::file('foto1', ['id' => 'foto1', 'style' => 'display:none']) !!}
                            @if ($errors->has('foto1'))
                                <span class="form-control-feedback">
                                    <strong>{{ $errors->first('foto1') }}</strong>
                                </span>
                            @endif
                          </div>
                        </div>
                        <h3>Foto 2</h3>
                        <div class="row">
                          <div class="col-md-12 {{ $errors->has('foto2') ? ' has-danger' : '' }}">
                            @php($existe = false)
                            @foreach($fotos as $foto)
                              @if($foto->tipo == 'PISO_EN_PROCESO')
                                <center><img class="img-thumbnail img-fluid box" src="{{asset('imagenes/evidencias/').'/'.$foto->nombreArchivo}}" alt="" id="img2"></center>
                                @php($existe = true)
                              @endif
                            @endforeach
                            @if(!$existe)
                              <center><img class="img-thumbnail img-fluid box" src="{{asset('imagenes/evidencias/foto.png')}}" alt="" id="img2"></center>
                            @endif
                            {!! Form::file('foto2', ['id' => 'foto2', 'style' => 'display:none']) !!}
                            @if ($errors->has('foto2'))
                                <span class="form-control-feedback">
                                    <strong>{{ $errors->first('foto2') }}</strong>
                                </span>
                            @endif
                          </div>
                        </div>
                        <h3>Foto 3</h3>
                        <div class="row">
                          <div class="col-md-12 {{ $errors->has('foto3') ? ' has-danger' : '' }}">
                            @php($existe = false)
                            @foreach($fotos as $foto)
                              @if($foto->tipo == 'PISO_TERMINADO')
                                <center><img class="img-thumbnail img-fluid box" src="{{asset('imagenes/evidencias/').'/'.$foto->nombreArchivo}}" alt="" id="img3"></center>
                                @php($existe = true)
                              @endif
                            @endforeach
                            @if(!$existe)
                              <center><img class="img-thumbnail img-fluid box" src="{{asset('imagenes/evidencias/foto.png')}}" alt="" id="img3"></center>
                            @endif
                            {!! Form::file('foto3', ['id' => 'foto3', 'style' => 'display:none']) !!}
                            @if ($errors->has('foto3'))
                                <span class="form-control-feedback">
                                    <strong>{{ $errors->first('foto3') }}</strong>
                                </span>
                            @endif
                          </div>
                        </div>
                        <h3>Otras fotos</h3>
                        <div class="row {{ $errors->get('fotoN.*') ? ' has-danger' : '' }}">
                          <div id="otros" class="row">
                            @php($existe = false)
                            @foreach($fotos as $foto)
                              @if($foto->tipo == 'OTROS')
                              <div class="col-md-4">
                                <div class="image_wrapper">
                                  <center>
                                    <img class="img-thumbnail img-fluid box" src="{{asset('imagenes/evidencias/').'/'.$foto->nombreArchivo}}" alt="" id="imgN">
                                    <img src="{{asset('imagenes/aplicacion/cerrar24x24.png')}}" title="eliminar" class="remove">
                                  </center>
                                </div>
                              </div>
                                @php($existe = true)
                              @endif
                            @endforeach
                            @if(!$existe)
                            <div class="col-md-4">
                              <center><img class="img-thumbnail img-fluid box" src="{{asset('imagenes/evidencias/foto.png')}}" alt="" id="imgN"></center>
                            </div>
                            @endif
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <label class="custom-file">
                                {!! Form::file('fotoN[]', ['class' => 'custom-file-input', 'id' => 'fotoN', 'multiple']) !!}
                                <span class="custom-file-control"></span>
                              </label>
                              @foreach($errors->get('fotoN.*') as $error)
                                @foreach($error as $value)
                                  <span class="form-control-feedback">
                                      <strong>{{ $value }}</strong>
                                  </span>
                                @endforeach
                              @endforeach
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-12">
                      {!! Form::submit('Guardar', ['class' => 'btn green-inverse btn-lg', 'style' => 'width:100%']) !!}
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
<script type="text/javascript" src="{{asset('jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/Evidencias/actualizarEvidencia.js')}}"></script>
<script type="text/javascript">
  var token = '{{ Session::token() }}';
  var imageDefault = '{{asset("imagenes/evidencias/foto.png")}}'
</script>
@endsection
