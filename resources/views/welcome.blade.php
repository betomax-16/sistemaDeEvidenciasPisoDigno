@extends('layouts.app') @section('styles')
<link rel="stylesheet" href="{{asset('css/morris.css')}}">
<link rel="stylesheet" href="{{asset('css/graficas.css')}}">
<link rel="stylesheet" href="{{asset('css/odometer-theme-train-station.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/textoPresentacion.css')}}" />
<link rel="stylesheet" href="{{asset('css/style1.css')}}">
<link rel="stylesheet" href="{{asset('css/Circulos.css')}}">
<link rel="stylesheet" href="{{asset('css/Estadisticas.css')}}">



<link rel="stylesheet" href="{{asset('css/odometer-theme-train-station.css')}}"> @endsection @section('content')

<div class="bak">
    <section class="Bienvenidos">
        <div class="sp-container hidden-md-down" style="z-index:1;">
            <div class="sp-content">
                <div class="sp-wrap sp-left">
                    <h2>
    					<span class="sp-top">What if you wouldn't get</span>
    					<span class="sp-mid">spam</span>
    					<span class="sp-bottom">anymore?</span>
    				</h2>
                </div>
                <div class="sp-wrap sp-right">
                    <h2>
    					<span class="sp-top">Wouldn't that be absolutely</span>
    					<span class="sp-mid">great<i>!</i><i>?</i></span>
    					<span class="sp-bottom">Yeah, it would!</span>
    				</h2>
                </div>
            </div>
            <div class="sp-full">
                <h2>A great way to get rid of spam!</h2>
                <a href="#">Sign up now!</a>
            </div>
        </div>
        <div class="hidden-lg-up" id="mini" style="z-index:1;">
            <div class="col-xs-12">
                <center>
                    <h2>A great way to get rid of spam!</h2>
                    <a href="#">Sign up now!</a>
                </center>
            </div>
        </div>
        <ul class="cb-slideshow">
            <li><span>Image 01</span></li>
            <li><span>Image 02</span></li>
            <li><span>Image 03</span></li>
        </ul>
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
        @include('layouts/templates/Estadisticas')
    </div>

    <div class="container ">
        @include('layouts/templates/Circulos')
    </div>
    @include('layouts/templates/modal') @include('layouts/menu/footer') @endsection @section('javascripts')
    <!-- jQuery first, then Tether, then Bootstrap JS. -->


    <script src="{{asset('js/estilos.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('js/odometer.min.js')}}"></script>
    <script src="{{asset('js/Welcome/grafica.js')}}"></script>
    <script src="{{asset('js/circle-progress.min.js')}}"></script>

    <script>
        $('.Beneficiados').waypoint(function() {
            setTimeout(function() {
                $('#odometer1').html(34);
                $('#odometer2').html(35);
                $('#odometer3').html(36);
                $('#odometer4').html(37);
            }, 100);
            this.destroy();
        }, {
            offset: '70%',
            triggerOnce: true
        });

    </script>

    @endsection
