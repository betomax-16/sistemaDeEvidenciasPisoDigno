@extends('layouts.app') @section('styles')
<link rel="stylesheet" href="{{asset('css/morris.css')}}">
<link rel="stylesheet" href="{{asset('css/graficas.css')}}">
<link rel="stylesheet" href="{{asset('css/odometer-theme-train-station.css')}}">
@endsection @section('content')
<section class="Bienvenidos text-xs-center">
    <div class="container">
        <div class="row">
            <h1 class="display-3 col-xs-12 col-md-4 wow rubberBand">Ayudanos <br> a <br> <span>Ayudar</span></h1>

            <div class="slide offset-md-1 col-md-7 hidden-md-down">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img src="{{asset( 'imagenes/aplicacion/Logo3.png')}}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset( 'imagenes/aplicacion/Logo3.png')}}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset( 'imagenes/aplicacion/Logo3.png')}}" alt="First slide">
                        </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="icon-prev" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="icon-next" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>


        </div>
        <div class="texto-encavezado ">
            <a href="{{route('contacto')}}" class="btn btn-secondary btn-lg ">Contactanos</a>
        </div>
        <div class="flecha_bajar">
            <a href="#nosotros"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
        </div>
        <a name="nosotros"></a>
    </div>
</section>
<section class="M-V">
    <div class="container-fluid">
        <div class="row opciones">
            <button type="button" class=" btn btn-secondary A" data-toggle="collapse" data-target="#collapseMision" aria-expanded="false" aria-controls="collapseExample">Mision</button>
            <button type="button" class="btn btn-secondary ENM" data-toggle="collapse" data-target="#collapseVision" aria-expanded="false" aria-controls="collapseExample">Vision</button>
            <button type="button" class="btn btn-secondary B" data-toggle="collapse" data-target="#collapseObjetivo" aria-expanded="false" aria-controls="collapseExample">Objetivo</button>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="collapse col-md-12 " id="collapseMision">
                    <div class="card card-block">
                        <h1>Mision</h1> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="collapse col-md-12 " id="collapseVision">
                    <div class="card card-block">
                        <h1>Vision</h1> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="collapse col-md-12 " id="collapseObjetivo">
                    <div class="card card-block">
                        <h1>Objetivo</h1> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                    </div>
                </div>
            </div>
        </div>




</section>

<section class="Nosotros">
    <div class="container">

        <div class="row  NC">
            <article class="col-xs-12 col-md-6">
                <h1>Nosotros</h1>
                <br>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates dicta ipsa eligendi fugit illum ipsam debitis illo, voluptas sequi, dolorum quis, possimus, consequuntur necessitatibus aliquid architecto cupiditate. Quaerat, error, quis.</p>
            </article>

            <header class="text-xs-center col-xs-12 offset-md-1 col-md-5">
                <h1 class="NC2">Nuestra comunidad</h1>
                <br>
                <h2><span><i class="fa fa-quote-right" aria-hidden="true"></i></span></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate harum adipisci et eos rerum consectetur, dolorem culpa. Dolor magnam fuga perspiciatis, beatae accusantium, labore similique, quisquam laudantium architecto, iure cumque.</p>
            </header>
        </div>
    </div>
</section>

<section class="lo-que-hacemos p-a-1">

    <div class="container">
        <br>
        <br>
        <h2 class="titulo text-xs-center font-weight-bold">¿Que es lo <span>que hacemos?</span></h2>
        <h5 class="text-xs-center">Ayudandanos a ayudar</h5>

        <div class="linea"></div>
        <br>
        <div class="row">

            <ul class="col-xs-6 col-lg-4 text-xs-center text-lg-left  wow bounceInLeft">
                <li>
                    <img src="{{asset('imagenes/aplicacion/Bivienda.svg')}}" alt="" aria-hidden="true">
                    <div class="contenedor-eleccion">
                        <h4>Ponemos piso firme </h4>
                        <p class="hidden-md-down">Se pone piso firme a las casas con piso de tierra o en peor estado.</p>
                    </div>
                </li>

                <li>
                    <img src="{{asset('imagenes/aplicacion/despensa.svg')}}" alt="">
                    <div class="contenedor-eleccion">
                        <h4>Entregamos despensas </h4>
                        <p class="hidden-md-down">A las Familias de escasos recursos se les entrega una despensa cada mes.</p>
                    </div>
                </li>
                <li>
                    <img src="{{asset('imagenes/aplicacion/MedioAmbiente.svg')}}" alt="">
                    <div class="contenedor-eleccion">
                        <h4>Ayudamos a los menos aforunados</h4>
                        <p class="hidden-md-down">Se entregan, sillas de ruedas, bastones y demas a quienes mas lo necesitan.</p>
                    </div>
                </li>
            </ul>

            <div class=" mision hidden-md-down col-lg-4  wow tada">
                <img src="{{asset('imagenes/aplicacion/mision.svg')}}" alt="mision">
            </div>

            <ul class="col-xs-6 col-lg-4 text-xs-center text-lg-right wow bounceInRight">
                <li>
                    <img src="{{asset('imagenes/aplicacion/Bivienda.svg')}}" alt="" aria-hidden="true">
                    <div class="contenedor-eleccion">
                        <h4>Ponemos piso firme </h4>
                        <p class="hidden-md-down">Se pone piso firme a las casas con piso de tierra o en peor estado.</p>
                    </div>
                </li>
                <li>
                    <img src="{{asset('imagenes/aplicacion/despensa.svg')}}" alt="">
                    <div class="contenedor-eleccion">
                        <h4>Entregamos despensas </h4>
                        <p class="hidden-md-down">A las Familias de escasos recursos se les entrega una despensa cada mes.</p>
                    </div>

                </li>
                <li>
                    <img src="{{asset('imagenes/aplicacion/MedioAmbiente.svg')}}" alt="">
                    <div class="contenedor-eleccion">
                        <h4>Ayudamos a los menos aforunados</h4>
                        <p class="hidden-md-down">Se entregan, sillas de ruedas, bastones y demas a quienes mas lo necesitan.</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>

<section class="Beneficiados">
    <div class="container">
        <div class="row CJ text-xs-center">
            <div class="cajas col-xs-6 col-md-3">
                <div class="icono">
                    <img src="{{asset('imagenes/aplicacion/Educacion.svg')}}" alt="Educacion">
                </div>
                <br>
                <div class="contenido">
                    <h2><span class="odometer" id="odometer1">0</span></h2>
                    <br>
                    <p>Campaas Ganadas</p>
                </div>
            </div>
            <div class="cajas col-xs-6  col-md-3 offset-md-0">
                <div class="icono">
                    <img src="{{asset('imagenes/aplicacion/Educacion.svg')}}" alt="Educacion">
                </div>
                <br>
                <div class="contenido">
                    <h2><span class="odometer" id="odometer2">0</span></h2>
                    <br>
                    <p>Campaas Ganadas</p>
                </div>
            </div>
            <br>
            <div class="cajas col-xs-6 col-md-3">
                <div class="icono">
                    <img src="{{asset('imagenes/aplicacion/Educacion.svg')}}" alt="Educacion">
                </div>
                <br>
                <div class="contenido">
                    <h2><span class="odometer" id="odometer3">0</span></h2>
                    <br>
                    <p>Campaas Ganadas</p>
                </div>
            </div>
            <div class="cajas col-xs-6 col-md-3 offset-md-0">
                <div class="icono">
                    <img src="{{asset('imagenes/aplicacion/Educacion.svg')}}" alt="Educacion">
                </div>
                <br>
                <div class="contenido">
                    <h2><span class="odometer" id="odometer4">0</span></h2>
                    <br>
                    <p>Campaas Ganadas</p>
                </div>
            </div>
        </div>
    </div>
</section>

<main class="programas   wow zoomIn p-1">
    <h3 class="titulo text-xs-center font-weight-bold">Nuestros Programas</h3>
    <div class="container">
        <div class="row" id="proyectos">

            <article class="col-lg-4" href="#PisoD" data-toggle="modal" data-target="#PisoD">
                <input type="hidden" name="ruta" value="{{route('evidencia.evidencias', ['piso digno', 21])}}">
                <img src=" {{asset('imagenes/aplicacion/Bivienda.svg')}} " alt="LogoPiso Digno">
                <h3><a> Piso Digno</a></h3>
                <p class="hidden-md-down">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia natus asperiores quo eaque, reiciendis provident nobis voluptatem. Quos repellat excepturi cupiditate earum exercitationem porro tempore, odit consectetur fugit ipsa facere.</p>
                <button class="btn btn-secondary hidden-md hidden-md-down">Más Informacion</button>
            </article>

            <article class="col-lg-4" data-toggle="modal" data-target="#PisoD">
                <input type="hidden" name="ruta" value="#">
                <img src="{{asset('imagenes/aplicacion/despensa.svg')}}" alt="LogoPiso Digno">
                <h3><a>Despensas</a></h3>
                <p class="hidden-md-down">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia natus asperiores quo eaque, reiciendis provident nobis voluptatem. Quos repellat excepturi cupiditate earum exercitationem porro tempore, odit consectetur fugit ipsa facere.</p>
                <button class="btn btn-secondary hidden-md hidden-md-down">Más Informacion</button>
            </article>

            <article class="col-lg-4" data-toggle="modal" data-target="#PisoD">
                <input type="hidden" name="ruta" value="#">
                <img src="{{asset('imagenes/aplicacion/Salud.svg')}}" alt="LogoPiso Digno">
                <h3><a>Salud</a></h3>
                <p class="hidden-md-down">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia natus asperiores quo eaque, reiciendis provident nobis voluptatem. Quos repellat excepturi cupiditate earum exercitationem porro tempore, odit consectetur fugit ipsa facere.</p>
                <button class="btn btn-secondary hidden-md hidden-md-down">Más Informacion</button>
            </article>
        </div>
    </div>
</main>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3 class="text-xs-center p-3 ">
        Medición de Pobreza 2014 | Puebla
        <a href="http://www.coneval.org.mx/coordinacion/entidades/Puebla/Paginas/pobreza-2014.aspx" target="_blank">CONEVAL</a>
      </h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-block">
            <div id="graph"></div>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card">
        <div class="card-block" id="circulos">
          <div class="card-text">
              <h5 class="text-xs-center">Indicadores de carencias sociales</h5>
          </div>
          <div class="col-md-2 text-xs-center">
            <div class="primera circle">
              <strong></strong>
              <span>Rezago educativo</span>
            </div>
          </div>
          <div class="col-md-2 text-xs-center">
            <div class="segunda circle">
              <strong></strong>
              <span>Servicios de salud</span>
            </div>
          </div>
          <div class="col-md-2 text-xs-center">
            <div class="tercera circle">
              <strong></strong>
              <span>Seguridad social</span>
            </div>
          </div>
          <div class="col-md-2 text-xs-center">
            <div class="cuarta circle">
              <strong></strong>
              <span>Espacios <br> en la vivienda</span>
            </div>
          </div>
          <div class="col-md-2 text-xs-center">
            <div class="quinta circle">
              <strong></strong>
              <span>Servicios <br> en la vivienda</span>
            </div>
          </div>
          <div class="col-md-2 text-xs-center">
            <div class="sexta circle">
              <strong></strong>
              <span>La alimentación</span>
            </div>
          </div>
        </div>
        <div class="card-footer" id="infoGrafica" style="overflow:auto;"></div>
      </div>
    </div>
  </div>
</div>
@include('layouts/templates/modal') @include('layouts/menu/footer') @endsection @section('javascripts')
<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="{{asset('js/estilos.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('js/odometer.min.js')}}"></script>
<script src="{{asset('js/morris.min.js')}}"></script>
<script src="{{asset('js/Welcome/grafica.js')}}"></script>
<script src="{{asset('js/circle-progress.min.js')}}"></script>
<script>
$('.Beneficiados').waypoint(function () {
  setTimeout(function(){
    $('#odometer1').html(34);
    $('#odometer2').html(35);
    $('#odometer3').html(36);
    $('#odometer4').html(37);
  }, 100);
},{offset:'70%',triggerOnce: true});
</script>
@endsection
