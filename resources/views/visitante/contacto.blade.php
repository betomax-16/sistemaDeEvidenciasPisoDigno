@extends('layouts.app') @section('styles')
<link rel="stylesheet" href="{{asset('css/general.css')}}">
<link rel="stylesheet" href="{{asset('css/contactanos.css')}}">
<link rel="stylesheet" href="{{asset('css/footer/footer.css')}}">
@endsection @section('content')
@include('flash::message')
  <div class="container espacioPagina marco">
      <div class="row">
          <div class="col-md-8">
            <div class="form-container">
              <div class="form-header">
                <h1 class="subtitulo1">Formulario de contacto</h1>
              </div>
              <div class="form-body">
                {!! Form::open(['route' => 'enviarContacto', 'method' => 'POST']) !!}
                <div class="form-group {{ $errors->has('nombre') ? 'has-danger' : '' }}">
                  <label>Nombre</label>
                  @php($error = $errors->has('nombre') ? 'form-control-danger' : '')
                  {!! Form::text('nombre', old('nombre'), ['class' => 'form-control '.$error, 'autocomplete' => 'off', 'autofocus']) !!}
                  @if ($errors->has('nombre'))
                    <div class="message-error">{{ $errors->first('nombre') }}</div>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('telefono') ? 'has-danger' : '' }}">
                    <label>Teléfono</label>
                    @php($error = $errors->has('telefono') ? 'form-control-danger' : '')
                    {!! Form::tel('telefono', old('telefono'), ['class' => 'form-control '.$error, 'autocomplete' => 'off']) !!}
                    @if ($errors->has('telefono'))
                      <div class="message-error">{{ $errors->first('telefono') }}</div>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                  <label>Email</label>
                  @php($error = $errors->has('email') ? 'form-control-danger' : '')
                  {!! Form::email('email', old('email'), ['class' => 'form-control '.$error, 'autocomplete' => 'off']) !!}
                  @if ($errors->has('email'))
                    <div class="message-error">{{ $errors->first('email') }}</div>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('asunto') ? 'has-danger' : '' }}">
                  <label>Asunto</label>
                  @php($error = $errors->has('asunto') ? 'form-control-danger' : '')
                  {!! Form::text('asunto', old('asunto'), ['class' => 'form-control '.$error, 'autocomplete' => 'off']) !!}
                  @if ($errors->has('asunto'))
                    <div class="message-error">{{ $errors->first('asunto') }}</div>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('mensaje') ? 'has-danger' : '' }}">
                  <label>Mensaje</label>
                  {!! Form::textarea('mensaje', old('mensaje'), ['class' => 'form-control ', 'autocomplete' => 'off', 'size' => '50x4']) !!}
                  @if ($errors->has('mensaje'))
                    <div class="message-error">{{ $errors->first('mensaje') }}</div>
                  @endif
                </div>
                <div class="form-group" style="margin-top:25px;">
                  <center>
                    <button id="btnGuardar" type="submit" class="btn green-inverse circle" style="width:100%"><i class="fa fa-paper-plane" aria-hidden="true"></i> Enviar</button>
                    <button id="reset" type="reset" class="btn blue-inverse circle" style="width:100%"><i class="fa fa-refresh" aria-hidden="true"></i> Limpiar</button>
                  </center>
                </div>
                {!! Form::close() !!}
              </div>
            </div>
          </div>
          <div class="col-md-4">
              <h3 class="subtitulo3">¡Escríbenos!</h3>
              <p>¿Dudas o comentarios? Usa este formulario y en breve te asistiremos.</p>
              <p>Si te interesa aportar tu talento en nuestras diversas iniciativas,
                o te gustaría generar un impacto social en tu comunidad, no dudes en
                hacérnoslo saber por cualquiera de nuestros medios de contacto.</p>
              <p>
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                Lateral Poniente del Hospital del Niño Poblano, número 1033, interior 5 A,
                colonia Concepción La Cruz, San Andrés Cholula, Puebla; C.P. 72197.</p>
                {!!$map['html']!!}
                <div class="row hidden-md-down">
                  <div class="col-lg-7 telefonos">
                    <ul>
                      <li><a href="tel:+522225837134" onclick="return (navigator.userAgent.match(/Android|iPhone|iPad|iPod|Mobile/i))!=null;"><i class="fa fa-phone-square" aria-hidden="true"></i></a><span>: (222) 583-7134</span></li>
                      <li><a href="https://www.facebook.com/gsuppuebla/" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a><span>: @gsuppuebla</span></li>
                      <li><a href="https://twitter.com/gsuppuebla" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a><span>: @gsuppuebla</span></li>
                    </ul>
                  </div>
                  <div class="col-lg-5">
                    <img src="{{asset('imagenes/aplicacion/qr.jpg')}}" alt="" class="img-fluid">
                  </div>
                </div>
                <div class="row hidden-md-down">
                  <div class="col-md-12">
                    <h4>Horarios de Atención</h4>
                    <p>Lunes a Viernes de 9:00 a 18:00 horas</p>
                  </div>
                </div>
          </div>
      </div>
      <div class="row">
        <div class="col-md-12 hidden-lg-up">
          <div class="row">
            <div class="col-md-5 col-sm-12  col-xs-12 horarios">
              <h4>Horarios de Atención</h4>
              <p>Lunes a Viernes de 9:00 a 18:00 horas</p>
            </div>
            <div class="col-md-4 col-sm-8 col-xs-8 telefonos">
              <ul>
                <li><a href="tel:+522225837134" onclick="return (navigator.userAgent.match(/Android|iPhone|iPad|iPod|Mobile/i))!=null;"><i class="fa fa-phone-square" aria-hidden="true"></i></a><span>: (222) 583-7134</span></li>
                <li><a href="https://www.facebook.com/gsuppuebla/" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a><span>: @gsuppuebla</span></li>
                <li><a href="https://twitter.com/gsuppuebla" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a><span>: @gsuppuebla</span></li>
              </ul>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-4 qr">
              <img src="{{asset('imagenes/aplicacion/qr.jpg')}}" alt="" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
  </div>
 @include('layouts/menu/footer')
@endsection @section('javascripts')
<script type="text/javascript">var centreGot = false;</script>
{!!$map['js']!!}
<script type="text/javascript">
  $(document).ready(function () {
    $('#contacto').addClass('active');
    $('#reset').click(function () {
      $('input[name=nombre]').focus();
    });
  });
</script>
@endsection
