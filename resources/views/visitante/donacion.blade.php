@extends('layouts.app') @section('styles')
<link rel="stylesheet" href="{{asset('css/general.css')}}">
<link rel="stylesheet" href="{{asset('css/donaciones/donaciones.css')}}">
@endsection @section('content')
@include('flash::message')
  <div class="container-fluid">
    <div class="row tiempo">
      <div class="col-md-6 imagen">
        <img src="{{asset('imagenes/evidencias/8d08a0138ba61f08d4729726fae36964_1482722838.jpg')}}" alt="" class="img-fluid">
      </div>
      <div class="col-md-6 texto">
        <h4 class="text-xs-center">Dona tiempo</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate harum adipisci et eos rerum consectetur, dolorem culpa. Dolor magnam fuga perspiciatis, beatae accusantium, labore similique, quisquam laudantium architecto, iure cumque.</p>
        <center><button type="button" name="button" class="btn blue-inverse">Ir</button></center>
      </div>
    </div>
    <div class="row especie">
      <div class="col-md-6 texto hidden-sm-down">
        <h4 class="text-xs-center">Dona en especie</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate harum adipisci et eos rerum consectetur, dolorem culpa. Dolor magnam fuga perspiciatis, beatae accusantium, labore similique, quisquam laudantium architecto, iure cumque.</p>
        <center><button type="button" name="button" class="btn blue-inverse">Ir</button></center>
      </div>
      <div class="col-md-6 imagen">
        <img src="{{asset('imagenes/evidencias/8d08a0138ba61f08d4729726fae36964_1482722838.jpg')}}" alt="" class="img-fluid">
      </div>
      <div class="col-md-6 texto hidden-md-up">
        <h4 class="text-xs-center">Dona en especie</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate harum adipisci et eos rerum consectetur, dolorem culpa. Dolor magnam fuga perspiciatis, beatae accusantium, labore similique, quisquam laudantium architecto, iure cumque.</p>
        <center><button type="button" name="button" class="btn blue-inverse">Ir</button></center>
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
          <div id="RFC-form" class="row referencia-bancaria hidden">
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
          <div id="SPEI-form" class="row spei hidden">
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
          <div id="paypal-form" class="row paypal">
            <h1 class="text-xs-center">paypal</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
@include('layouts/menu/footer')
@endsection @section('javascripts')
<script src="{{asset('js/donaciones/donaciones.js')}}" charset="utf-8"></script>
<script type="text/javascript">
  var token = '{{ Session::token() }}';
</script>
@endsection
<!--<style media="screen">
  h1{
    border-radius: 25px 0 25px 0;
    color: #fff;
  }
  .donante{
    min-height: 100px;
    background: rgba(245, 237, 198, 0.82);
    border-radius: 25px;
    margin-bottom: 35px;
    padding-bottom: 20px;
  }
  .tarjeta{
    min-height: 100px;
    background: rgba(129, 162, 206, 0.82);
    border-radius: 25px;
    margin-bottom: 35px;
    padding-bottom: 20px;
  }
  .donacion{
    min-height: 100px;
    background: rgba(232, 189, 232, 0.82);
    border-radius: 25px;
    margin-bottom: 35px;
    padding-bottom: 20px;
  }
  .donante h1{
    background: #ffe76c;
    border: 3px solid rgba(218, 189, 40, 0.67);
  }
  .tarjeta h1{
    background: #3e74b9;
    border: 3px solid rgb(55, 89, 123);
  }
  .donacion h1{
    background: #c392c2;
    border: 3px solid rgb(134, 97, 133);
  }
  .donacion .cantidades{
    display: flex;
    margin: 0 35px 5px 35px;
  }
  .cantidades button{
    flex: 1 1 auto;
    color: #6c6c6c;
    background: #fff;
    text-align: center;
    padding: 4px 0;
    box-shadow: 3px 4px 1px 0px rgba(0, 0, 0, 0.1);
  }
  .form-group{
    margin: 0 35px;
  }
  .donar{
    margin-top: 15px;
  }
</style>-->

<!--<div class="row">
  <div class="col-md-12">
    <div class="donante">
      <h1 class="titulo4 text-xs-center">Datos del donador</h1>
      <div class="form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control ', 'autocomplete' => 'off', 'autofocus']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('apellidoPaterno', 'Apellido Paterno') !!}
        {!! Form::text('apellidoPaterno', null, ['class' => 'form-control ', 'autocomplete' => 'off']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('apellidoMaterno', 'Apellido Materno') !!}
        {!! Form::text('apellidoMaterno', null, ['class' => 'form-control ', 'autocomplete' => 'off']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', null, ['class' => 'form-control ', 'autocomplete' => 'off']) !!}
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="tarjeta">
      <h1 class="titulo4 text-xs-center">Datos de la tarjeta</h1>
      <div class="form-group">
        {!! Form::label('nombreTarjeta', 'Nombre en la Tarjeta') !!}
        {!! Form::text('nombreTarjeta', null, ['class' => 'form-control ', 'autocomplete' => 'off']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('numeroTarjeta', 'Número de la Tarjeta') !!}
        {!! Form::text('numeroTarjeta', null, ['class' => 'form-control ', 'autocomplete' => 'off']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('fechaVencimiento', 'Fecha de Vencimiento') !!}
        {!! Form::select('mes', ['' => 'MES', '1' => '01', '2' => '02', '3' => '03', '4' => '04', '5' => '05', '6' => '06', '7' => '07', '8' => '08', '9' => '09', '10' => '10', '11' => '11', '12' => '12'],'', ['class' => 'form-control', 'id' => 'mes']) !!}
        {!! Form::select('anio', ['' => 'AÑO', '2017' => '2017'],'', ['class' => 'form-control', 'id' => 'anio']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('codigo', 'Código de seguridad') !!}
        {!! Form::text('codigo', null, ['class' => 'form-control ', 'autocomplete' => 'off']) !!}
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-12">
        <div class="donacion">
          <h1 class="titulo4 text-xs-center ">¿Cuánto le gustaría donar?</h1>
          <div class="cantidades">
            <button type="button" name="button">$50</button>
            <button type="button" name="button">$100</button>
            <button type="button" name="button">$200</button>
            <button type="button" name="button">$500</button>
            <button type="button" name="button">Otro</button>
          </div>
          <div class="form-group">
            {!! Form::text('monto', null, ['class' => 'form-control ', 'placeholder' => '$0.00', 'autocomplete' => 'off']) !!}
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-xs-center donar">
        <button type="button" name="button" class="btn purple-inverse">Donar</button>
      </div>
    </div>
  </div>
</div>-->
