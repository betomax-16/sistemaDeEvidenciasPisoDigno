<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <style media="screen">
      body {
        font-family: DejaVu Sans;
      }
      img{
        height: 100px;
        max-width: 100%;
      }
      h1{
          margin-bottom: 15px;
      }
      .contenedor{
        margin-bottom: 15px;
        width: 100%;
      }
      .contenedor .datosPersonales{
        width: 100%;
        margin-bottom: 15px;
        padding: 5px 5px 15px 5px;
        border-bottom: 1px solid grey;
      }
      b{
        margin-left: 10px;
      }
      .contenedor .datosCuenta{
        width: 100%;
        padding: 5px 5px 15px 5px;
        margin-bottom: 15px;
      }
      .concepto{
        width: 100%;
        text-align: center;
      }
      .monto{
        font-size: 23px;
      }
      p span, h5{
        font-weight: bold;
      }
      #logoBanco{
        float: right;
        margin-right: 20px;
        height: 80px;
        z-index: -1;
        margin-top: 10px;
      }
      .title{
        text-align: center;
      }
    </style>
  </head>
  <body>
    <!--
      sistema es el nombre de la carpeta de la aplicacion
      cambiar el nombre de esta carpeta po el propio nombre de la que se tiene
    -->
    @php($proyecto = 'sistema')
    @php($len = strlen($proyecto) + 1)
    @php($url1 = substr(dirname(__FILE__), 0, strrpos(dirname(__FILE__), $proyecto)+$len).'public\imagenes\aplicacion\Logo3.png')
    @php($url2 = substr(dirname(__FILE__), 0, strrpos(dirname(__FILE__), $proyecto)+$len).'public\imagenes\aplicacion\bbva.jpg')
    <img src="{{$url1}}" alt="">
    <img id="logoBanco" src="{{$url2}}" alt="">
    <!--<img src="{{asset('imagenes\aplicacion\Logo3.png')}}" alt="">
    <img id="logoBanco" src="{{asset('imagenes\aplicacion\bbva.jpg')}}" alt="">-->
    <hr>
    <h3 class="title">LINEA DE CAPTURA PARA PAGO EN VENTANILLA BANCARIA</h3>
    <div class="contenedor">
      <div class="datosPersonales">
        <span class="datos">Nombre:<b>{{$nombre}}</b></span><br>
        <span class="datos">Estado:<b>{{$edo}}</b></span><br>
        <span class="datos">Municipio:<b>{{$mun}}</b></span><br>
        <span class="datos">Colonia:<b>{{$col}}</b></span><br>
        <span class="datos">Calle:<b>{{$calle}}</b></span><br>
        <span class="datos">C.P.:<b>{{$cp}}</b></span><br>
        <span class="datos">RFC:<b>{{$rfc}}</b></span><br>
      </div>
      <div class="DatosCuenta">
        <span class="cuenta">Cuentahabiente:<b>Grupos Sociales Unidos por Puebla 13 de Noviembre A.C.</b></span><br>
        <span class="cuenta">Número de cuenta:<b>0105269997</b></span><br>
        <span class="cuenta">CLABE interbancaria:<b>012650001052699974</b></span><br>
      </div>
    </div>
    <div class="concepto">

        Concepto: Donativo Grupos Sociales Unidos por Puebla<br>
        <span class="datos">Monto:<b class="monto">${{$monto}}</b>/100 M.N.</span><br>

    </div>
    <p>
      <h4>ESTIMADO DONANTE:</h4>
      Con esta línea de captura podrá usted acudir a cualquier ventanilla BANCOMER
      para realizar su donación a la <span>Grupos Sociales Unidos por Puebla 13 de Noviembre A.C</span>.
    </p>
    <h4>Grupos Sociales Unidos por Puebla agradece su donativo!</h4>
  </body>
</html>
