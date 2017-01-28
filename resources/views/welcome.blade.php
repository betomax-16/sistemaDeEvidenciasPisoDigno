@extends('layouts.app') @section('styles')
<link rel="stylesheet" href="{{asset('css/odometer-theme-train-station.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/textoPresentacion.css')}}" />
<link rel="stylesheet" href="{{asset('css/style1.css')}}">
<link rel="stylesheet" href="{{asset('css/Estadisticas.css')}}">
<link rel="stylesheet" href="{{asset('css/general.css')}}"> @endsection @section('content')
<div class="bak">
    <section class="Bienvenidos">
        <div class="sp-container hidden-md-down" style="z-index:1;">
            <div class="sp-content">
                <div class="sp-wrap sp-left">
                    <h2>
    					<span class="sp-top">cambiar el mundo es el resultado de la</span>
    					<span class="sp-mid"><b>suma</b></span>
    					<span class="sp-bottom">de todos nuestros pasos</span>
    				</h2>
                </div>
                <div class="sp-wrap sp-right">
                    <h2>
    					<span class="sp-top">en un minuto puedes cambiar de</span>
    					<span class="sp-mid"><b>actitud<i>!</i><i></i></b></span>
    					<span class="sp-bottom">y al mismo tiempo el dia entero</span>
    				</h2>
                </div>
            </div>
            <div class="sp-full">
                <h2>Ayudanos a ayudar</h2>
                <a href="{{route('donacion')}}">Dona!</a>
            </div>
        </div>
        <div class="hidden-lg-up" id="mini" style="z-index:1;">
            <div class="col-xs-12">
                <center>
                    <h2 class="text-xs-center">Ayudanos a ayudar</h2>
                    <a href="#">Dona!</a>
                </center>
            </div>
        </div>
        <ul class="cb-slideshow">
            <li><span>Image 01</span></li>
            <li><span>Image 02</span></li>
            <li><span>Image 03</span></li>
        </ul>
    </section>
    <section class="M-V text-justify">
        <div class="container-fluid">
            <div class="row opciones">
                <button type="button" class=" btn btn-secondary A" data-toggle="collapse" data-target="#collapseMision" aria-expanded="false" aria-controls="collapseExample">Misión</button>
                <button type="button" class="btn btn-secondary ENM" data-toggle="collapse" data-target="#collapseVision" aria-expanded="false" aria-controls="collapseExample">Visión</button>
                <button type="button" class="btn btn-secondary B" data-toggle="collapse" data-target="#collapseObjetivo" aria-expanded="false" aria-controls="collapseExample">Objetivo</button>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="collapse col-md-12 " id="collapseMision">
                        <div class="card card-block">
                            Consolidar de manera efectiva en los doscientos diecisiete municipios que conforman el Estado de Puebla, una red permanente de colaboradores, patrocinadores y voluntarios que contribuyan a generar, promover y capitalizar esfuerzos encaminados a remediar la brecha de desigualdad social que limita el desarrollo pleno de las familias poblanas más necesitadas.
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="collapse col-md-12 " id="collapseVision">
                        <div class="card card-block">
                            En el año 2022,
                            <spam> GRUPOS SOCIALES UNIDOS POR PUEBLA 13 DE NOVIEMBRE A.C.</spam>, será un referente entre las organizaciones de la sociedad civil en el Estado de Puebla, por su eficaz gestión y canalización de apoyos sociales; el impacto de sus acciones asistenciales en la calidad de vida de las familias poblanas beneficiadas; su intensa y continua labor en el área de orientación y capacitación; la transparente ejecución de los recursos económicos y materiales captados; y, por el alto sentido humano de todos los que la conforman.

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="collapse col-md-12 " id="collapseObjetivo">
                        <div class="card card-block">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                        </div>
                    </div>
                </div>
            </div>




    </section>

    <section class="Nosotros">
        <div class="container">

            <div class="row  NC">
                <article class="col-xs-12 col-md-6">
                    <h1 class="subtitulo1">Nosotros</h1>
                    <br>
                    <p>
                        <spam> GRUPOS SOCIALES UNIDOS POR PUEBLA 13 DE NOVIEMBRE A.C.,</spam> es una organización no lucrativa de la sociedad civil que opera primordialmente en el Estado de Puebla, la cual busca generar acciones encaminadas a mitigar los estragos que el abandono y la carencia de recursos económicos y materiales, han provocado en los grupos más vulnerables de nuestro Estado.
                        <br>
                        <br> Fue precisamente en dos mil once, cuando nuestro presidente, el señor Jesús Barrales Sevilla, buscó constituir un equipo de trabajo con el afán de sembrar una semilla de solidaridad y corresponsabilidad en todos aquellos que de forma desinteresada se han unido a la causa de ayudar a los que menos tienen.
                        <br>
                        <br> De ahí que la asociación se haya dado a la tarea de desarrollar y ejecutar acciones en los ámbitos de la educación, salud, alimentación, vestido, desarrollo humano y medio ambiente, con las que busca contribuir a alcanzar la línea de bienestar de las familias apoyadas, y en consecuencia, su desarrollo integral y el de sus comunidades.
                        <br>
                        <br> Sin duda,
                        <spam> GRUPOS SOCIALES UNIDOS POR PUEBLA 13 DE NOVIEMBRE A.C.,</spam> representa un esfuerzo más que se suma a labor diaria de personas como tú, esto es, de seres humanos con la firme convicción de abonar al porvenir de sus semejantes.
                    </p>
                </article>
                <header class="text-xs-center col-xs-12 offset-md-1 col-md-5" style="z-index:1;">
                    <h1 class="NC2">Nuestra comunidad</h1>
                    <br>
                    <h2><span><i class="fa fa-quote-right" aria-hidden="true"></i></span></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate harum adipisci et eos rerum consectetur, dolorem culpa. Dolor magnam fuga perspiciatis, beatae accusantium, labore similique, quisquam laudantium architecto, iure cumque.</p>
                </header>
            </div>
        </div>
    </section>

    <section class="lo-que-hacemos p-a-1">

        <div class="container-fluid">
            <br>
            <br>
            <h2 class="titulo text-xs-center subtitulo1">¿Qué es lo <span>que hacemos?</span></h2>
            <h5 class="text-xs-center">Ayudanos a ayudar</h5>

            <div class="linea"></div>
            <br>
            <div class="row">

                <ul class="col-xs-6 col-lg-4 text-xs-center text-lg-left  wow bounceInLeft">
                    <li>
                        <img src="{{asset('imagenes/aplicacion/Bivienda.svg')}}" class="img-fluid" alt="" aria-hidden="true">
                        <div class="contenedor-eleccion">
                            <h4>Vivienda </h4>
                            <p class="hidden-md-down">Porque un HOGAR es más que un techo y cuatro paredes, implementamos acciones encaminadas a MEJORAR las condiciones de HABITABILIDAD en los hogares menos afortunados.</p>
                        </div>
                    </li>
                    <br>
                    <li>
                        <img src="{{asset('imagenes/aplicacion/despensa.svg')}}" alt="">
                        <div class="contenedor-eleccion">
                            <h4>Alimentación </h4>
                            <p class="hidden-md-down">Buscamos generar acciones y condiciones que garanticen una alimentación DISPONIBLE, ACCESIBLE y ADECUADA a las familias más necesitadas.</p>
                        </div>
                    </li>
                    <br>
                    <li>
                        <img src="{{asset('imagenes/aplicacion/Salud.svg')}}" alt="">
                        <div class="contenedor-eleccion">
                            <h4>Salud</h4>
                            <p class="hidden-md-down">Dado que salud no es sólo la ausencia de enfermedades o afecciones, efectuamos campañas de prevención y atención temprana que permiten un completo estado de BIENESTAR FÍSICO, MENTAL y SOCIAL a las personas más vulnerables.</p>
                        </div>
                    </li>
                </ul>

                <div class=" mision hidden-md-down col-lg-4 wow tada">
                    <img src="{{asset('imagenes/aplicacion/mision.svg')}}" alt="mision">
                </div>

                <ul class="col-xs-6 col-lg-4 text-xs-center text-lg-right wow bounceInRight">
                    <li>
                        <img src="{{asset('imagenes/aplicacion/Educacion.svg')}}" alt="" aria-hidden="true">
                        <div class="contenedor-eleccion">
                            <h4>Educación </h4>
                            <p class="hidden-md-down">El estudio es una oportunidad para crecer en el mundo del saber, por eso gestionamos becas y patrocinios que permiten a nuestros niños y jóvenes continuar con el desarrollo de sus CAPACIDADES y TALENTOS.</p>
                        </div>
                    </li>
                    <br>
                    <li>
                        <img src="{{asset('imagenes/aplicacion/MedioAmbiente.svg')}}" alt="">
                        <div class="contenedor-eleccion">
                            <h4>Medio Ambiente </h4>
                            <p class="hidden-md-down">El planeta es nuestro hogar común y todos somos corresponsables de su cuidado, de ahí que fomentamos iniciativas dirigidas a la PRESERVACIÓN y DESARROLLO SUSTENTABLE de los recursos naturales.</p>
                        </div>

                    </li>
                    <br>
                    <li>
                        <img src="{{asset('imagenes/aplicacion/OS.svg')}}" alt="">
                        <div class="contenedor-eleccion">
                            <h4>Orientación Social</h4>
                            <p class="hidden-md-down">Todo problema tiene una solución, por eso organizamos a grupos de profesionales a efecto de brindar jornadas de CAPACITACIÓN y ASESORÍA sobre temas cotidianos, así como de asuntos muy particulares que aquejan a nuestros allegados.</p>
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
        <h3 class="text-xs-center subtitulo1">Nuestros Programas</h3>
        <div class="container">
            <div class="row" id="proyectos">

                <article class="col-lg-4" href="#PisoD" data-toggle="modal" data-target="#PisoD">
                    <input type="hidden" name="ruta" value="{{route('evidencia.evidencias', ['piso digno', 21])}}">
                    <img src=" {{asset('imagenes/aplicacion/Bivienda.svg')}} " alt="LogoPiso Digno">
                    <h3><a> Piso Digno</a></h3>
                    <p class="hidden-md-down">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia natus asperiores quo eaque, reiciendis provident nobis voluptatem. Quos repellat excepturi cupiditate earum exercitationem porro tempore, odit consectetur fugit ipsa facere.</p>
                    <button class="btn blue-inverse hidden-md hidden-md-down">Más Información</button>
                </article>

                <article class="col-lg-4" data-toggle="modal" data-target="#PisoD">
                    <input type="hidden" name="ruta" value="#">
                    <img src="{{asset('imagenes/aplicacion/despensa.svg')}}" alt="LogoPiso Digno">
                    <h3><a>Despensas</a></h3>
                    <p class="hidden-md-down">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia natus asperiores quo eaque, reiciendis provident nobis voluptatem. Quos repellat excepturi cupiditate earum exercitationem porro tempore, odit consectetur fugit ipsa facere.</p>
                    <button class="btn purple-inverse hidden-md hidden-md-down">Más Información</button>
                </article>

                <article class="col-lg-4" data-toggle="modal" data-target="#PisoD">
                    <input type="hidden" name="ruta" value="#">
                    <img src="{{asset('imagenes/aplicacion/Salud.svg')}}" alt="LogoPiso Digno">
                    <h3><a>Salud</a></h3>
                    <p class="hidden-md-down">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia natus asperiores quo eaque, reiciendis provident nobis voluptatem. Quos repellat excepturi cupiditate earum exercitationem porro tempore, odit consectetur fugit ipsa facere.</p>
                    <button class="btn red-inverse hidden-md hidden-md-down">Más Información</button>
                </article>
            </div>
        </div>
    </main>

    <div class="container-fluid estadisticas">
        <div class=" container svge">
            @include('layouts/templates/Estadisticas')
        </div>
    </div>
    @include('layouts/templates/modal') @include('layouts/menu/footer') @endsection @section('javascripts')
    <!-- jQuery first, then Tether, then Bootstrap JS. -->


    <script src="{{asset('js/estilos.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('js/odometer.min.js')}}"></script>

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
        $(document).ready(function() {
            $('.ir-arriba').click(function() {
                $('body, html').animate({
                    scrollTop: '0px'
                }, 300);
            });
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#inicio').addClass('active');
        });

    </script>
    @endsection
