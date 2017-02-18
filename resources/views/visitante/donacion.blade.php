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
            <h1 class="titulo4 text-xs-center">Donar recurso</h1>
            <div class="donante">
              <div class="form-group">
                {!! Form::label('nombre', 'Nombre', ['class' => 'sr-only']) !!}
                {!! Form::text('nombre', null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Nombre', 'autofocus']) !!}
                <span class="form-control-feedback">
                    <strong id="errornombre"></strong>
                </span>
              </div>
              <div class="form-line">
                <div class="form-group">
                  {!! Form::label('apellidoPaterno', 'Apellido Paterno', ['class' => 'sr-only']) !!}
                  {!! Form::text('apellidoPaterno', null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Apellido Paterno']) !!}
                  <span class="form-control-feedback">
                      <strong id="errorapellidoPaterno"></strong>
                  </span>
                </div>
                <div class="form-group">
                  {!! Form::label('apellidoMaterno', 'Apellido Materno', ['class' => 'sr-only']) !!}
                  {!! Form::text('apellidoMaterno', null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Apellido Materno']) !!}
                  <span class="form-control-feedback">
                      <strong id="errorapellidoMaterno"></strong>
                  </span>
                </div>
              </div>
              <div class="form-group">
                {!! Form::label('email', 'Email', ['class' => 'sr-only']) !!}
                {!! Form::email('email', null, ['class' => 'form-control ', 'autocomplete' => 'off', 'placeholder' => 'Email']) !!}
                <span class="form-control-feedback">
                    <strong id="erroremail"></strong>
                </span>
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
                {!! Form::label('rfc', 'RFC') !!}
                {!! Form::text('rfc', null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'RFC']) !!}
                <span class="form-control-feedback">
                    <strong id="errorrfc"></strong>
                </span>
              </div>
              <div class="form-group">
                {!! Form::label('colonia', 'Colonia') !!}
                {!! Form::text('colonia', null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Colonia']) !!}
                <span class="form-control-feedback">
                    <strong id="errorcolonia"></strong>
                </span>
              </div>
              <div class="form-group">
                {!! Form::label('calle', 'Dirección (Calle y número)') !!}
                {!! Form::text('calle', null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Calle y número']) !!}
                <span class="form-control-feedback">
                    <strong id="errorcalle"></strong>
                </span>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    {!! Form::label('cp', 'C.P.') !!}
                    {!! Form::number('cp', null, ['class' => 'form-control', 'placeholder' => 'C.P.', 'maxlength' => '5']) !!}
                    <span class="form-control-feedback">
                        <strong id="errorcp"></strong>
                    </span>
                  </div>
                </div>
                <div class="col-md-8">
                  {!! Form::label('monto', 'Monto') !!}
                  <div class="input-group">
                    <span class="input-group-addon" id="btnGroupAddon2">$</span>
                    {!! Form::text('monto', null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => '0.00', 'aria-describedby' => 'btnGroupAddon2']) !!}
                  </div>
                  <span class="form-control-feedback">
                      <strong style="color:#d9534f;" id="errormonto"></strong>
                  </span>
                </div>
              </div>
              <center>
                <span>Concepto:</span><br>
                <h5>Donación GSUPPUEBLA</h5>
                <button id="RFC-button" url="{{route('rfc')}}" type="button" name="button" class="btn red-inverse">Generar Referencia Bancaria</button>
              </center>
            </div>
          </div>
          <div id="SPEI-form" class="spei hidden">
            <div class="col-md-8">
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
            <div class="col-md-4">
              <p>
                <dl class="datos-spei">
                  <dt>Cuentahabiente:</dt>
                  <dd>Grupos Sociales Unidos por Puebla 13 de Noviembre A.C.</dd>
                  <dt>Banco:</dt>
                  <dd>BBVA Bancomer</dd>
                  <dt>Número de cuenta:</dt>
                  <dd>0105269997</dd>
                  <dt>CLABE interbancaria:</dt>
                  <dd>012650001052699974</dd>
                </dl>
              </p>
            </div>
          </div>
          <div id="paypal-form" class="paypal">
            <div class="">
              <div class="input-group{{ $errors->has('donativo') ? ' has-danger' : '' }}">
                <span class="input-group-addon" id="btnGroupAddon2">$</span>
                {!! Form::text('donativo', null, ['class' => 'form-control', 'placeholder' => '0.00', 'id' => 'donativo']) !!}
              </div>
              @if ($errors->has('donativo'))
                  <span class="form-control-feedback">
                      <strong style="color:#d9534f;">{{ $errors->first('donativo') }}</strong>
                  </span>
              @endif
              <span class="form-control-feedback">
                  <strong style="color:#d9534f;" id="errordonativo"></strong>
              </span>
            </div>
            <center>
              <button id="btnPaypal" url="{{route('payment')}}" type="submit" name="button" class="btn green-inverse"><i class="fa fa-paypal" aria-hidden="true"></i>Donar</button>
            </center>


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
<script type="text/javascript">
  var token = '{{ Session::token() }}';
</script>
<script src="{{asset('js/donaciones/donaciones.js')}}" charset="utf-8"></script>
@endsection
