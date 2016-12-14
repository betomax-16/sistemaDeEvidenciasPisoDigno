@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{asset('jquery-ui/jquery-ui.min.css')}}">
<style media="screen">
.box{
  height: 250px;
  overflow: hidden;
}
.box img{
	height: 100%;
	width: 100%;
	object-fit:cover;
	-o-object-fit:cover;
}

</style>
@endsection
@section('content')
<div class="container espacioPagina">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading"><h1>Nueva Evidencia {{Session::get('proyecto')}}</h1></div>
                <div class="panel-body">
                  {!! Form::open(['route' => 'evidencia.store', 'method' => 'POST', 'files' => true]) !!}
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group{{ $errors->has('idMunicipio') ? ' has-error' : '' }}">
                        {!! Form::label('municipio', 'Municipio') !!}
                        {!! Form::text('municipio', old('municipio'), ['placeholder' => 'Municipio...', 'id' => 'municipio', 'class' => 'form-control']) !!}
                        {!! Form::hidden('idMunicipio', old('idMunicipio'), ['id' => 'idMunicipio']) !!}
                        @if ($errors->has('idMunicipio') || $errors->has('municipio'))
                            <span class="help-block">
                                <strong>{{ $errors->first('idMunicipio') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group{{ $errors->has('idLocalidad') ? ' has-error' : '' }}">
                        {!! Form::label('localidad', 'Localidad') !!}
                        {!! Form::text('localidad', old('localidad'), ['placeholder' => 'Localidad...', 'id' => 'localidad', 'class' => 'form-control', 'disabled']) !!}
                        {!! Form::hidden('idLocalidad', old('idLocalidad'), ['id' => 'idLocalidad']) !!}
                        @if ($errors->has('idLocalidad') || $errors->has('localidad'))
                            <span class="help-block">
                                <strong>{{ $errors->first('idLocalidad') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group{{ $errors->has('familia') ? ' has-error' : '' }}">
                        {!! Form::label('familia', 'Familia') !!}
                        {!! Form::text('familia', old('familia'), ['placeholder' => 'Familia...', 'id' => 'familia', 'class' => 'form-control']) !!}
                        @if ($errors->has('familia'))
                            <span class="help-block">
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
                          <div class="col-md-10 col-md-offset-1{{ $errors->has('foto1') ? ' has-error' : '' }}">
                            <center><img class="img-thumbnail img-responsive box" src="{{asset('imagenes/evidencias/foto.png')}}" alt="" id="img1"></center>
                            {!! Form::file('foto1', ['id' => 'foto1', 'style' => 'display:none']) !!}
                            @if ($errors->has('foto1'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('foto1') }}</strong>
                                </span>
                            @endif
                          </div>
                        </div>
                        <h3>Foto 2</h3>
                        <div class="row">
                          <div class="col-md-10 col-md-offset-1{{ $errors->has('foto2') ? ' has-error' : '' }}">
                            <center><img class="img-thumbnail img-responsive box" src="{{asset('imagenes/evidencias/foto.png')}}" alt="" id="img2"></center>
                            {!! Form::file('foto2', ['id' => 'foto2', 'style' => 'display:none']) !!}
                            @if ($errors->has('foto2'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('foto2') }}</strong>
                                </span>
                            @endif
                          </div>
                        </div>
                        <h3>Foto 3</h3>
                        <div class="row">
                          <div class="col-md-10 col-md-offset-1{{ $errors->has('foto3') ? ' has-error' : '' }}">
                            <center><img class="img-thumbnail img-responsive box" src="{{asset('imagenes/evidencias/foto.png')}}" alt="" id="img3"></center>
                            {!! Form::file('foto3', ['id' => 'foto3', 'style' => 'display:none']) !!}
                            @if ($errors->has('foto3'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('foto3') }}</strong>
                                </span>
                            @endif
                          </div>
                        </div>
                        <h3>Otras fotos</h3>
                        <div class="row {{ $errors->get('fotoN.*') ? ' has-error' : '' }}">
                          <div id="otros" class="col-md-10 col-md-offset-1">
                            <center><img class="img-thumbnail img-responsive box" src="{{asset('imagenes/evidencias/foto.png')}}" alt="" id="imgN"></center>
                          </div>
                          {!! Form::file('fotoN[]', ['id' => 'fotoN', 'multiple']) !!}
                          @foreach($errors->get('fotoN.*') as $error)
                            @foreach($error as $value)
                              <span class="help-block">
                                  <strong>{{ $value }}</strong>
                              </span>
                            @endforeach
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-12">
                      {!! Form::submit('Guardar', ['class' => 'btn btn-success btn-lg', 'style' => 'width:100%']) !!}
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
<script type="text/javascript" src="{{asset('js/Evidencias/subirEvidencia.js')}}"></script>
<script type="text/javascript">
  var token = '{{ Session::token() }}';
  var imageDefault = '{{asset("imagenes/evidencias/foto.png")}}'
</script>
@endsection
