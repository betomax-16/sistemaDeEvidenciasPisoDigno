@extends('layouts.app') @section('styles')
<link rel="stylesheet" href="{{asset('css/odometer-theme-train-station.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/textoPresentacion.css')}}" />
<link rel="stylesheet" href="{{asset('css/style1.css')}}">
<link rel="stylesheet" href="{{asset('css/Estadisticas.css')}}">
<link rel="stylesheet" href="{{asset('css/welcome/modalesProgramas.css')}}">
<link rel="stylesheet" href="{{asset('css/graficassvg.css')}}">
<style media="screen">
@media (max-width: 575px) {
  .odometer-digit{
    font-size: 65%;
  }
}
</style>
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
          					<span class="sp-bottom">y al mismo tiempo el día entero</span>
          				</h2>
                </div>
            </div>
            <div class="sp-full">
                <h2>Ayúdanos a ayudar</h2>
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
    
    <section class="container M-V text-justify">

        <div class=" Mision col-xs-12 col-md-4">
            <h1>Misión</h1>
            <div class="Mision2">
                <p>Consolidar de manera efectiva en los doscientos diecisiete municipios que conforman el Estado de Puebla, una red permanente de colaboradores, patrocinadores y voluntarios que contribuyan a generar, promover y capitalizar esfuerzos encaminados a remediar la brecha de desigualdad social que limita el desarrollo pleno de las familias poblanas más necesitadas.</p>

            </div>
        </div>
        
        <div class="Valores col-xs-12 col-md-4">
            <h1>Valores</h1>
            <div class="Valores2">
                <ol  type="a">
                    <li>Integridad</li>
                    <li>Solidaridad</li>
                    <li>Respeto</li>
                    <li>Tolerancia</li>
                    <li>Trabajo en equipo</li>
                    <li>Servicio</li>
                    <li>Compromiso</li>
                    <li>Transparencia</li>
                </ol>

            </div>
        </div>
        
        <div class=" Vision  col-xs-12  col-md-4">
            <h1 class="text-left	">Visión</h1>
            <div class="Vision2">
                <p>En el año 2022, GRUPOS SOCIALES UNIDOS POR PUEBLA 13 DE NOVIEMBRE A.C., será un referente entre las organizaciones de la sociedad civil en el Estado de Puebla, por su eficaz gestión y canalización de apoyos sociales; el impacto de sus acciones asistenciales en la calidad de vida de las familias poblanas beneficiadas; su intensa y continua labor en el área de orientación y capacitación; la transparente ejecución de los recursos económicos y materiales captados; y, por el alto sentido humano de todos los que la conforman.</p>
            </div>
        </div>
    </section>
    
    <section class="container Obj-Val text-justify">

     <h1 class="text-xs-center">Objetivos</h1>
      <div class="container Obj-Val2">
           <div class="container col-xs-12">
               <h4 class="text-xs-center">General</h4>
               <p>Desarrollar, ejecutar e implementar programas, proyectos y actividades en materia de <spam>VIVIENDA</spam>, <spam>EDUCACIÓN</spam>, <spam>ALIMENTACIÓN</spam>, <spam>MEDIO AMBIENTE</spam>, <spam>SALUD</spam> y <spam>ORIENTACIÓN SOCIAL</spam>, encaminadas a mejorar la calidad de vida de todas las personas, sectores y regiones de escasos recursos en el Estado de Puebla, en especial, la de aquellos grupos vulnerables por edad, sexo o problemas de discapacidad.</p>
           </div>
            <div class="container col-xs-12 offset-md-1 col-md-10">
             <h4 class="text-xs-center">Específicos</h4>
               <div class="row OBJ-ESP">
                <ol type="a">
                   <div class="col-md-6 OBJ-ESP1">
                    <li>Implementar acciones encaminadas a <spam>MEJORA</spam>R las condiciones de <spam>HABITABILIDAD</spam> en los hogares menos afortunados;</li>
                    <li>Generar acciones y condiciones que garanticen una alimentación <spam>DISPONIBLE</spam>, <spam>ACCESIBLE</spam> y <spam>ADECUADA</spam> a las familias más necesitadas;</li>
                    <li>Efectuar campañas de prevención y atención temprana que brinden un completo estado de <spam>BIENESTAR FÍSICO</spam>, <spam>MENTAL</spam> y <spam>SOCIAL</spam> a las personas más vulnerables;</li>

                    </div>
                    <div class="col-md-6 OBJ-ESP2">
                    <li>Gestionar becas y patrocinios que permitan a nuestros niños y jóvenes continuar con el desarrollo de sus <spam>CAPACIDADES</spam> y <spam>TALENTOS</spam>;</li>
                    <li>Fomentar iniciativas dirigidas a la <spam>PRESERVACIÓN</spam> y <spam>DESARROLLO SUSTENTABLE</spam> de los recursos naturales; y,</li>
                    <li>Organizar a grupos de profesionales a efecto de proporcionar jornadas de <spam>CAPACITACIÓN</spam> y <spam>ASESORÍA</spam> sobre temas cotidianos, así como de asuntos muy particulares que aquejan a nuestros allegados.</li>
                    <br>
                    </div>
            </ol>

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


                <div id="carouselExampleIndicators" class="carousel slide col-xs-12 offset-md-1 col-md-5" data-ride="carousel">
 
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="{{asset('imagenes/fotos/file1.jpg')}}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="{{asset('imagenes/fotos/file2.jpg')}}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="{{asset('imagenes/fotos/file3.jpg')}}" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="{{asset('imagenes/fotos/file4.jpg')}}" alt="Ford slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="{{asset('imagenes/fotos/file5.jpg')}}" alt="Five slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="{{asset('imagenes/fotos/file6.jpg')}}" alt="Six slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="{{asset('imagenes/fotos/file8.jpg')}}" alt="Eight slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="{{asset('imagenes/fotos/file9.jpg')}}" alt="Nine slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="{{asset('imagenes/fotos/file10.jpg')}}" alt="Eleven slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="{{asset('imagenes/fotos/file11.jpg')}}" alt="Twelve slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="{{asset('imagenes/fotos/file12.jpg')}}" alt="Third slide">
                        </div>

                    </div>
                   <a class="left carousel-control" href="#carouselExampleIndicators" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#carouselExampleIndicators" data-slide="next">
            <span class="icon-next"></span>
        </a>
                </div>
            </div>
        </div>
    </section>

    <section class="lo-que-hacemos p-a-1">

        <div class="container">
            <br>
            <br>
            <h2 class="titulo text-xs-center subtitulo1">¿Qué es lo <span>que hacemos?</span></h2>
            <h5 class="text-xs-center">Ayúdanos a ayudar</h5>

            <div class="linea"></div>
            <br>
            <div class="row" id="programas">

                <ul class="col-xs-6 col-lg-4 text-xs-center text-lg-left  wow bounceInLeft">
                    <li>
                        <img src="{{asset('imagenes/aplicacion/Bivienda.svg')}}" class="img-fluid" data-toggle="modal" data-target="#viviendaModal">
                        <div class="contenedor-eleccion">
                            <h4>Vivienda </h4>
                            <p class="hidden-md-down">Porque un HOGAR es más que un techo y cuatro paredes, implementamos acciones encaminadas a MEJORAR las condiciones de HABITABILIDAD en los hogares menos afortunados.</p>
                        </div>
                    </li>
                    <br>
                    <li>
                        <img src="{{asset('imagenes/aplicacion/despensa.svg')}}" alt="" data-toggle="modal" data-target="#alimentacionModal">
                        <div class="contenedor-eleccion">
                            <h4>Alimentación </h4>
                            <p class="hidden-md-down">Buscamos generar acciones y condiciones que garanticen una alimentación DISPONIBLE, ACCESIBLE y ADECUADA a las familias más necesitadas.</p>
                        </div>
                    </li>
                    <br>
                    <li>
                        <img src="{{asset('imagenes/aplicacion/Salud.svg')}}" alt="" data-toggle="modal" data-target="#saludModal">
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
                        <img src="{{asset('imagenes/aplicacion/Educacion.svg')}}" alt="" data-toggle="modal" data-target="#educacionModal">
                        <div class="contenedor-eleccion">
                            <h4>Educación </h4>
                            <p class="hidden-md-down">El estudio es una oportunidad para crecer en el mundo del saber, por eso gestionamos becas y patrocinios que permiten a nuestros niños y jóvenes continuar con el desarrollo de sus CAPACIDADES y TALENTOS.</p>
                        </div>
                    </li>
                    <br>
                    <li>
                        <img src="{{asset('imagenes/aplicacion/MedioAmbiente.svg')}}" alt="" data-toggle="modal" data-target="#medioAmbienteModal">
                        <div class="contenedor-eleccion">
                            <h4>Medio Ambiente </h4>
                            <p class="hidden-md-down">El planeta es nuestro hogar común y todos somos corresponsables de su cuidado, de ahí que fomentamos iniciativas dirigidas a la PRESERVACIÓN y DESARROLLO SUSTENTABLE de los recursos naturales.</p>
                        </div>

                    </li>
                    <br>
                    <li>
                        <img src="{{asset('imagenes/aplicacion/OS.svg')}}" alt="" data-toggle="modal" data-target="#orientacionSocialModal">
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
                <div class="cajas col-xs-6 col-md-4">
                    <div class="icono">
                        <img src="{{asset('imagenes/aplicacion/Bivienda.svg')}}" alt="Educacion">
                    </div>
                    <br>
                    <div class="contenido">
                        <h2><span class="odometer" id="odometer1">0</span></h2>
                        <h4 class="text-xs-center">Vivienda</h4>
                        <p>Que equivale a 327 familias poblanas apoyadas con alguno de nuestros programas.
                         </p>
                         <br>
                    </div>
                </div>
                <div class="cajas col-xs-6  col-md-4">
                    <div class="icono">
                        <img src="{{asset('imagenes/aplicacion/despensa.svg')}}" alt="Educacion">
                    </div>
                    <br>
                    <div class="contenido">
                        <h2><span class="odometer" id="odometer2">0</span></h2>
                        <h4 class="text-xs-center">Alimentación</h4>
                        <p>Cantidad que corresponde a 36 familias beneficiadas mensualmente con una despensa integral.</p>
                    </div>
                </div>
                <br>
                <div class="cajas col-xs-6 col-md-4">
                    <div class="icono">
                        <img src="{{asset('imagenes/aplicacion/Salud.svg')}}" alt="Educacion">
                    </div>
                    <br>
                    <div class="contenido">
                        <h2><span class="odometer" id="odometer3">0</span></h2>
                        <h4 class="text-xs-center">Salud</h4>
                        <p>Suma que representa el número de gestiones ante diversas instituciones de salud pública en el Estado de Puebla.</p>
                    </div>
                </div>
                <div class="cajas col-xs-6 col-md-4">
                    <div class="icono">
                        <img src="{{asset('imagenes/aplicacion/Educacion.svg')}}" alt="Educacion">
                    </div>
                    <br>
                    <div class="contenido">
                        <h2><span class="odometer" id="odometer4">0</span></h2>
                        <h4 class="text-xs-center">Educación</h4>
                        <p>Lo cual equivale al número de instituciones educativas impactadas.</p>
                    </div>
                </div>
                 <div class="cajas col-xs-6 col-md-4">
                    <div class="icono">
                        <img src="{{asset('imagenes/aplicacion/MedioAmbiente.svg')}}" alt="Educacion">
                    </div>
                    <br>
                    <div class="contenido">
                        <h2><span class="odometer" id="odometer5">0</span></h2>
                        <h4 class="text-xs-center">Medio Ambiente</h4>
                        <p>Próximamente estaremos implementando proyectos en tu entorno.</p>
                    </div>
                </div>
                 <div class="cajas col-xs-6 col-md-4">
                    <div class="icono">
                        <img src="{{asset('imagenes/aplicacion/OS.svg')}}" alt="Educacion">
                    </div>
                    <br>
                    <div class="contenido">
                        <h2><span class="odometer" id="odometer6">0</span></h2>
                        <h4 class="text-xs-center">Orientación Social</h4>
                        <p>En breve gestaremos acciones en tu comunidad.</p>
                        <br>
                    </div>
                </div>
            </div>
            <br>
            <h6>Las cifras antes descritas corresponden al número de beneficiarios por eje de acción, contabilizado a partir del once de diciembre de dos mil quince, a la fecha.</h6>
        </div>
    </section>

    <main class="programas   wow zoomIn p-1">
        <h3 class="text-xs-center subtitulo1">Nuestros Programas</h3>
        <div class="container">
            <div class="row" id="proyectos">

                <article id="PisoDigno" class="col-lg-4" href="#PisoD" data-toggle="modal" data-target="#PisoD">
                    <input type="hidden" name="ruta" value="{{route('evidencia.evidencias', ['piso digno', 21])}}">
                    <img src=" {{asset('imagenes/aplicacion/Bivienda.svg')}} " alt="LogoPiso Digno">
                    <h3><a>Vivienda</a></h3>
                    <p class="hidden-md-down">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia natus asperiores quo eaque, reiciendis provident nobis voluptatem. Quos repellat excepturi cupiditate earum exercitationem porro tempore, odit consectetur fugit ipsa facere.</p>
                    <button class="btn blue-inverse hidden-md hidden-md-down">Más Información</button>
                </article>

                <article id="Despensas" class="col-lg-4" data-toggle="modal" data-target="#PisoD">
                    <input type="hidden" name="ruta" value="#">
                    <img src="{{asset('imagenes/aplicacion/despensa.svg')}}" alt="LogoPiso Digno">
                    <h3><a>Alimentación</a></h3>
                    <p class="hidden-md-down">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia natus asperiores quo eaque, reiciendis provident nobis voluptatem. Quos repellat excepturi cupiditate earum exercitationem porro tempore, odit consectetur fugit ipsa facere.</p>
                    <button class="btn green-inverse hidden-md hidden-md-down">Más Información</button>
                </article>

                <article id="Salud" class="col-lg-4" data-toggle="modal" data-target="#PisoD">
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
    
  <div class="scrollmenu" >
        @include('layouts/templates/grafica1')   
        @include('layouts/templates/grafica2')
        @include('layouts/templates/grafica3') 
        @include('layouts/templates/grafica4')
        @include('layouts/templates/grafica5')   
        @include('layouts/templates/grafica6')     

</div>
    
    
    @include('layouts/templates/modal')
    @include('layouts/templates/modalesProgramas/salud')
    <br>
    @include('layouts/templates/modalesProgramas/vivienda')
    @include('layouts/templates/modalesProgramas/educacion')
    @include('layouts/templates/modalesProgramas/alimentacion')
    @include('layouts/templates/modalesProgramas/medioAmbiente')
    @include('layouts/templates/modalesProgramas/orientacionSocial')
    @include('layouts/menu/footer') @endsection @section('javascripts')
    <!-- jQuery first, then Tether, then Bootstrap JS. -->


    <script src="{{asset('js/estilos.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('js/odometer.min.js')}}"></script>



    <script>
        $('.Beneficiados').waypoint(function() {
            setTimeout(function() {
                $('#odometer1').html(1338);
                $('#odometer2').html(177);
                $('#odometer3').html(62);
                $('#odometer4').html(9);
                $('#odometer5').html(0);
                $('#odometer6').html(0);
            }, 100);
            //seccion infinity
            var LAG = 3;
            var odometer5val = 10;
            var odometer6val = 10;
            var odometer5 = new Odometer({
              el: document.querySelector('#odometer5'),
              value: odometer5val });
            odometer5.render()
            var odometer6 = new Odometer({
              el: document.querySelector('#odometer6'),
              value: odometer6val });
            odometer6.render()
            setInterval(function(){
                odometer5val = (odometer5val == 99) ? 10 : odometer5val++;
                odometer6val = (odometer6val == 99) ? 10 : odometer6val++;
              odometer5.update(odometer5val++);
              odometer6.update(odometer6val++);
            }, LAG);
            //--------
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
