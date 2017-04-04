@extends('layouts.app') @section('styles')
<link rel="stylesheet" href="{{asset('css/general.css')}}">
<link rel="stylesheet" href="{{asset('css/donaciones/secciones.css')}}">
<link rel="stylesheet" href="{{asset('css/footer/footer.css')}}">
<link rel="stylesheet" href="{{asset('css/donaciones/donaciones.css')}}">
<style media="screen">

</style>
@endsection @section('content')
  <div class="container-fluid">
    <div id="donacionEspecie" class="row">
      <div class="col-md-6 title">
        <h4 class="text-xs-center">DONA EN ESPECIE</h4>
        <p class="lastP">
          Nos esforzamos por día a día mejorar de forma integral la calidad de vida de quienes más nos necesitan,
          por eso buscamos TODO TIPO DE APOYO MATERIAL que abone a la causa.
          En este sentido, y en aras de favorecer la implementación de nuestros programas,
          agradecemos de antemano nos puedas apoyar con cualquiera de los siguientes insumos:
        </p>
        <center><a href="{{route('contacto')}}" class="btn purple-inverse">DONAR EN ESPECIE</a></center>
      </div>
      <div class="col-md-6 slider">
        <ul>
          <li class="item1">
            <h1>ALIMENTOS Y ABARROTES</h1><hr>
            <p>De preferencia no perecederos como lo son: agua, azúcar, arroz, aceite, café, frijol, leche en polvo, pastas y enlatados, por mencionar algunos.</p>
          </li>
          <li class="item2" style="display:none">
            <h1>ROPA Y CALZADO</h1><hr>
            <p>Para todas las edades, siempre y cuando sea nuevo o en buen estado.</p>
          </li>
          <li class="item3" style="display:none">
            <h1>Artículos de limpieza</h1><hr>
            <p>Para el hogar y aseo personal.</p>
          </li>
          <li class="item4" style="display:none">
            <h1>JUGUETES y LIBROS</h1><hr>
            <p>Nuevos o en buen estado.</p>
          </li>
          <li class="item5" style="display:none">
            <h1>INSUMOS MÉDICOS y MEDICAMENTOS</h1><hr>
            <p>Que no requieran receta médica, suplementos y vitaminas.</p>
          </li>
          <li class="item6" style="display:none">
            <h1>ARTÍCULOS ORTOPÉDICOS</h1><hr>
            <p>Tales como: sillas de ruedas, bastones, prótesis y órtesis diversas.</p>
          </li>
          <li class="item7" style="display:none">
            <h1>PAPELERÍA</h1><hr>
            <p>Artículos de oficina, papelería y útiles escolares.</p>
          </li>
          <li class="item8" style="display:none">
            <h1>EQUIPO DEPORTIVO</h1><hr>
            <p></p>
          </li>
          <li class="item9" style="display:none">
            <h1>INSTRUMENTOS MUSICALES</h1><hr>
            <p></p>
          </li>
          <li class="item10" style="display:none">
            <h1>EQUIPOS TECNOLÓGICOS</h1><hr>
            <p>Como computadoras, impresoras, tabletas, proyectores, bocinas, entre otras, nuevas o en buen estado.</p>
          </li>
          <li class="item11" style="display:none">
            <h1>EXTRAS</h1><hr>
            <p>Puedes entregar el producto de tu generosidad en nuestra OFICINA CENTRAL ubicada en: Lateral Poniente del Hospital del Niño Poblano, número 1033, interior 5 A, colonia Concepción La Cruz, San Andrés Cholula, Puebla; C.P. 72197.</p>
            <center><a id="btnTranslados" href="#" class="btn blue-inverse">Traslado de tus donativos</a></center>
          </li>
        </ul>
        <div class="buttons">
          <a href="#" class="active" targetItem="item1"></a>
          <a href="#" targetItem="item2"></a>
          <a href="#" targetItem="item3"></a>
          <a href="#" targetItem="item4"></a>
          <a href="#" targetItem="item5"></a>
          <a href="#" targetItem="item6"></a>
          <a href="#" targetItem="item7"></a>
          <a href="#" targetItem="item8"></a>
          <a href="#" targetItem="item9"></a>
          <a href="#" targetItem="item10"></a>
          <a class="botonEspecial" href="#" targetItem="item11"></a>
        </div>
      </div>
    </div>
    <div id="donacionTiempo" class="row">
      <div class="col-md-6 slider">
        <ul>
          <li class="item1">
            <h1>CAMPAÑAS FINANCIERAS</h1><hr>
            <p>Su principal objetivo es comprometer a personas o empresas a realizar una aportación mensual domiciliada que permita apadrinar a un niño, adulto mayor o familia, en alguno de nuestros programas.</p>
          </li>
          <li class="item2" style="display:none">
            <h1>CAPTACIÓN DE DONATIVOS</h1><hr>
            <p>Esta labor implica recabar donativos voluntarios en sitios públicos -alcancías, boteo, kilómetros de ayuda- al tiempo que se brinda información sobre la organización y sus líneas de acción.</p>
          </li>
          <li class="item3" style="display:none">
            <h1>EVENTOS ESPECIALES</h1><hr>
            <p>A lo largo del año GSUPPUEBLA desarrolla eventos -rifas, kermese, posadas, etc.- a efecto de recaudar fondos.</p>
          </li>
          <li class="item4" style="display:none">
            <h1>ASESORÍAS Y CHARLAS</h1><hr>
            <p>Consiste en brindar gratuitamente asesorías, talleres o capacitaciones a las familias beneficiadas, en alguna de las diversas áreas de expertis de nuestros voluntarios.</p>
          </li>
          <li class="item5" style="display:none">
            <h1>EXTRAS</h1><hr>
            <p>Ya sea que te interese llevar a cabo tu SERVICIO SOCIAL, PRÁCTICAS PROFESIONALES o quieras ser VOLUNTARIO, en GSUPPUEBLA las puertas están abiertas para ti.</p>
            <p>¿Quieres unirte? Comunícate con nosotros para que programemos una cita y juntos podamos marcar la diferencia.</p>
          </li>
        </ul>
        <div class="buttons">
          <a href="#" class="active" targetItem="item1"></a>
          <a href="#" targetItem="item2"></a>
          <a href="#" targetItem="item3"></a>
          <a href="#" targetItem="item4"></a>
          <a class="botonEspecial" href="#" targetItem="item5"></a>
        </div>
      </div>
      <div class="col-md-6 title">
        <h4 class="text-xs-center">DONA TIEMPO Y TALENTO</h4>
        <p>
          Porque un acto de generosidad no se limita a dar cosas materiales,
          sino que también involucra el tiempo que podamos invertir en ayudar a nuestros semejantes,
          te invitamos sumar tu talento, de acuerdo a tus preferencias y posibilidades,
          en alguno de nuestros PROGRAMAS, ACCIONES, GESTIONES o LABORES ADMINISTRATIVAS,
          que día a día ejecutamos para dar vida a esta tu asociación.
        </p>
        <p class="lastP">Así también, puedes donar parte de tu tiempo y tu corazón en alguna de las siguientes actividades permanentes:</p>
        <center><a href="{{route('contacto')}}" class="btn yellow-inverse">DONAR TIEMPO Y TALENTO</a></center>
      </div>
    </div>
    <div class="row recurso">
      <div class="container">
        <div class="row datos-personales">
          <div class="col-md-12">
            <hr>
            <h1 class="text-xs-center">DONA DINERO</h1>
            <p>La ejecución de cada una de nuestras acciones es producto de la suma de voluntades, esfuerzos y aportaciones de todas y cada una de las personas que, como tú, han confiado en hacer posible lo imposible, en APORTAR UN DESTELLO DE ESPERANZA a aquellos hermanos que menos tienen.</p>
            <p>Es por eso que, bajo un total sentido de corresponsabilidad, te invitamos a permitir que este proyecto humano siga en pie, por lo que precisamos tu ayuda aportando el monto que en tus posibilidades consideres justo, suficiente y necesario.</p>
            <p>Recuerda que somos donataria autorizada por lo que todos los donativos que realices son acreditables mediante RECIBOS DEDUCIBLES DE IMPUESTOS.</p>
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
<script src="{{asset('js/donaciones/secciones.js')}}" charset="utf-8"></script>
<script src="{{asset('js/donaciones/donaciones.js')}}" charset="utf-8"></script>
@endsection
