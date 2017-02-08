@extends('layouts.app') @section('styles')
<link rel="stylesheet" href="{{asset('css/general.css')}}">
<link rel="stylesheet" href="{{asset('css/footer/footer.css')}}">
<link rel="stylesheet" href="{{asset('css/donaciones/donaciones.css')}}">
@endsection @section('content')
  <div class="container-fluid">
    <div class="row tiempo">
      <div class="col-md-6 imagen">
        <img src="{{asset('imagenes/evidencias/8d08a0138ba61f08d4729726fae36964_1482722838.jpg')}}" alt="" class="img-fluid">
      </div>
      <div class="col-md-6 texto">
        <h4 class="text-xs-center">Dona tiempo</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate harum adipisci et eos rerum consectetur, dolorem culpa. Dolor magnam fuga perspiciatis, beatae accusantium, labore similique, quisquam laudantium architecto, iure cumque.</p>
        <center><a href="{{route('contacto')}}" class="btn blue-inverse">Contactar</a></center>
      </div>
    </div>
    <div class="row especie">
      <div class="col-md-6 texto hidden-sm-down">
        <h4 class="text-xs-center">Dona en especie</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate harum adipisci et eos rerum consectetur, dolorem culpa. Dolor magnam fuga perspiciatis, beatae accusantium, labore similique, quisquam laudantium architecto, iure cumque.</p>
        <center><a href="{{route('contacto')}}" class="btn blue-inverse">Contactar</a></center>
      </div>
      <div class="col-md-6 imagen">
        <img src="{{asset('imagenes/evidencias/8d08a0138ba61f08d4729726fae36964_1482722838.jpg')}}" alt="" class="img-fluid">
      </div>
      <div class="col-md-6 texto hidden-md-up">
        <h4 class="text-xs-center">Dona en especie</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate harum adipisci et eos rerum consectetur, dolorem culpa. Dolor magnam fuga perspiciatis, beatae accusantium, labore similique, quisquam laudantium architecto, iure cumque.</p>
        <center><a href="{{route('contacto')}}" class="btn blue-inverse">Contactar</a></center>
      </div>
    </div>
    <div class="row recurso">
      <div class="container">
        <div class="row datos-personales">
          <div class="col-md-12">
            <hr>
            <div class="donante">
              <h1 class="titulo4 text-xs-center">Donar recurso</h1>
              <div class="form-group">
                {!! Form::label('nombre', 'Nombre', ['class' => 'sr-only']) !!}
                {!! Form::text('nombre', null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Nombre', 'autofocus']) !!}
              </div>
              <div class="form-line">
                <div class="form-group">
                  {!! Form::label('apellidoPaterno', 'Apellido Paterno', ['class' => 'sr-only']) !!}
                  {!! Form::text('apellidoPaterno', null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Apellido Paterno']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('apellidoMaterno', 'Apellido Materno', ['class' => 'sr-only']) !!}
                  {!! Form::text('apellidoMaterno', null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Apellido Materno']) !!}
                </div>
              </div>
              <div class="form-group">
                {!! Form::label('email', 'Email', ['class' => 'sr-only']) !!}
                {!! Form::email('email', null, ['class' => 'form-control ', 'autocomplete' => 'off', 'placeholder' => 'Email']) !!}
              </div>
            </div>
          </div>
        </div>
        <div class="row tipo-recurso">
          <div class="col-md-12 menu-recurso">
            <ul>
              <li id="paypal" class="recurso-active"><a href="#">Paypal</a></li>
              <li id="RFC"><a href="#">Referencia Bancaria</a></li>
              <li id="SPEI"><a href="#">SPEI</a></li>
            </ul>
          </div>
        </div>
        <div id="forms-donaciones">
          <div id="RFC-form" class="referencia-bancaria hidden">
            <div class="col-md-12">
              <div class="form-group">
                {!! Form::label('rfc', 'RFC', ['class' => 'sr-only']) !!}
                {!! Form::text('rfc', null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'RFC']) !!}
              </div>
              <div class="form-line">
                <div class="form-group">
                  {!! Form::select('estado', ['L' => 'Large', 'S' => 'Small'], null, ['class' => 'form-control', 'placeholder' => 'Selecciona un estado']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('cp', 'C.P.', ['class' => 'sr-only']) !!}
                  {!! Form::text('cp', null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'C.P.']) !!}
                </div>
              </div>
              <center>
                <span>Concepto:</span><br>
                <h5>Donación GESUPPUEBLA</h5>
                <button id="RFC-button" type="button" name="button" class="btn red-inverse">Generar Referencia Bancaria</button>
              </center>
            </div>
          </div>
          <div id="SPEI-form" class="spei hidden">
            <div class="form-line">
              <div class="form-group">
                {!! Form::select('estado', ['L' => 'Large', 'S' => 'Small'], null, ['class' => 'form-control', 'placeholder' => 'Selecciona un estado']) !!}
              </div>
              <div class="form-group">
                {!! Form::label('cp', 'C.P.', ['class' => 'sr-only']) !!}
                {!! Form::text('cp', null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'C.P.']) !!}
              </div>
            </div>
            <center>
              <button id="SPEI-button" type="button" name="button" class="btn red-inverse">Guardar</button>
            </center>
            <br>
            <p>
              Instrucciones:
              <ol>
                <li>Ve al portal de tu banco.</li>
                <li>Entra a la sección para dar de alta una cuenta.</li>
                <li>Busca en “Banco”: Sistemas de Transferencias y pagos o STP o Sist Transf y Pagos.</li>
                <li>Da de alta la cuenta ingresando en el espacio de la CLABE la clave interbancaria que aparece en este recuadro.</li>
                <li>Una vez que aparezca dentro de tus cuentas registradas, realiza el donativo a esa cuenta desde tu portal del banco</li>
                <li>Espera 72 horas para que puedas generar tu recibo en esta página entrando a la sección de Mis Donaciones.</li>
              </ol>
            </p>
          </div>
          <div id="paypal-form" class="paypal">
            {!! Form::open(['route' => 'payment', 'method' => 'GET']) !!}
              <div class="form-group{{ $errors->has('donativo') ? ' has-danger' : '' }}">
                {!! Form::text('donativo', old('donativo'), ['class' => 'form-control', 'placeholder' => 'Donativo $0.00']) !!}
                @if ($errors->has('donativo'))
                    <span class="form-control-feedback">
                        <strong>{{ $errors->first('donativo') }}</strong>
                    </span>
                @endif
              </div>
              <center>
                <button id="btnPaypal" type="submit" name="button" class="btn green-inverse"><i class="fa fa-paypal" aria-hidden="true"></i>Donar</button>
              </center>
            {!! Form::close() !!}

            <!--<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
              <input type="hidden" name="cmd" value="_s-xclick">
              <input type="hidden" name="hosted_button_id" value="HZ6RQND46B38Y">
              <input type="image" src="https://www.sandbox.paypal.com/es_XC/MX/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
              <img alt="" border="0" src="https://www.sandbox.paypal.com/es_XC/i/scr/pixel.gif" width="1" height="1">
            </form>-->
          </div>
        </div>
      </div>
    </div>
  </div>
@include('layouts/menu/footer')
@endsection @section('javascripts')
@include('flash::message')
  @if(\Session::has('message'))
  <script type="text/javascript">
    bootbox.alert("{{ \Session::get('message') }}");
  </script>
	@endif
<script src="{{asset('js/donaciones/donaciones.js')}}" charset="utf-8"></script>
<script type="text/javascript">
  var token = '{{ Session::token() }}';
</script>
@endsection
