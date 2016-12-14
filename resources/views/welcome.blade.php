@extends('layouts.app')
@section('content')
<section class="Bienvenidos">
    <div class="container">
        <div class="row">
            <div class="logo2 col-xs-12 col-md-5">
                <img src="images/logo2.svg" alt="logo_del_sitio ">
            </div>
        </div>
        <div class="texto-encavezado text-xs-center">
            <a href="#" class="btn btn-secondary btn-lg ">Contactanos</a>
        </div>
        <div class="flecha_bajar text-xs-center">
            <a href="#nosotros"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
        </div>
</section>
<!-- Carga de archivos Css -->

<section class="nosotros " id="nosotros">
    <h1 class="h2 text-xs-center">Nosotros</h1>
    <div class="linea"></div>
    <br>
    <div class="container text-xs-center">

        <div class="row">
            <div class="col-xs-12  col-md-5">
                <p>Red Colaborativa es una plataforma dirigida al control y seguimiento detallado de proyectos destinado a eventos, congresos y concursos en los cuales es complicado llevar un control de los mismos, su objetivo fundamental es la busqueda de colaboradores que ayuden a impulsar el desarrollo de calidad e innovación de los proyectos tecnológicos.</p>
            </div>
            <div class="col-xs-12 col-md-6 offset-md-1">
                <img src="images/Nosotros1.jpg" alt="Nosotros2">
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12  col-md-6">
                <img src="images/Nosotros2.jpg" alt="Nosotros2">
                <br>
            </div>
            <div class="col-xs-12  col-md-5 offset-md-1">
                <p>Red Colaborativa es una plataforma dirigida al control y seguimiento detallado de proyectos destinado a eventos, congresos y concursos en los cuales es complicado llevar un control de los mismos, su objetivo fundamental es la busqueda de colaboradores que ayuden a impulsar el desarrollo de calidad e innovación de los proyectos tecnológicos.</p>
                <br>
            </div>
        </div>
    </div>

</section>
<section class="lo-que-hacemos p-a-1">

    <div class="container">
        <h2 class="h3 text-xs-center ">¿Que es lo <span>que hacemos?</span></h2>
        <p class="text-xs-center">
            Ayudandanos a ayudar
        </p>
        <div class="row">
            <div class="linea"></div>
            <br>
            <ul class="col-xs-6 col-lg-4 text-xs-center text-lg-left">
                <li>

                    <i class="fa fa-home" aria-hidden="true"></i>
                    <div class="contenedor-eleccion">
                        <h4>Ponemos piso firme </h4>
                        <p class="hidden-md-down">Se pone piso firme a las casas con piso de tierra o en peor estado.</p>
                    </div>
                </li>
                <li>
                    <i class="fa fa-inbox" aria-hidden="true"></i>
                    <div class="contenedor-eleccion">
                        <h4>Entregamos despensas </h4>
                        <p class="hidden-md-down">A las Familias de escasos recursos se les entrega una despensa cada mes.</p>
                    </div>
                </li>
                <li>
                    <i class="fa fa-wheelchair" aria-hidden="true"></i>
                    <div class="contenedor-eleccion">
                        <h4>Ayudamos a los menos aforunados</h4>
                        <p class="hidden-md-down">Se entregan, sillas de ruedas, bastones y demas a quienes mas lo necesitan.</p>
                    </div>
                </li>
            </ul>

            <div class="hidden-md-down col-lg-4">
                <img src="images/mision.png" alt="mision">
            </div>

            <ul class="col-xs-6 col-lg-4 text-xs-center text-lg-right">
                <li>
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <div class="contenedor-eleccion">
                        <h4>Ponemos piso firme </h4>
                        <p class="hidden-md-down">Se pone piso firme a las casas con piso de tierra o en peor estado.</p>
                    </div>
                </li>
                <li>
                    <i class="fa fa-inbox" aria-hidden="true"></i>
                    <div class="contenedor-eleccion">
                        <h4>Entregamos despensas </h4>
                        <p class="hidden-md-down">A las Familias de escasos recursos se les entrega una despensa cada mes.</p>
                    </div>

                </li>
                <li>
                    <i class="fa fa-wheelchair" aria-hidden="true"></i>
                    <div class="contenedor-eleccion">
                        <h4>Ayudamos a los menos aforunados</h4>
                        <p class="hidden-md-down">Se entregan, sillas de ruedas, bastones y demas a quienes mas lo necesitan.</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>

<section class="mision-vision text-center">
    <div class="mision">
        <h1>Mision</h1>
        <div class="linea"></div>
        <br>
        <p>La misión de Red Colaborativa es ayudar y ser una buena opción para la organización de eventos al crear, publicar, gestionar y difundir todo tipo de proyectos tecnologicos para fomentar e impulsar un entorno colaborativo de investigación tecnológica, científica, etc. A la vez ser una herramienta flexible para adaptarse a eventos de acuerdo a las necesidades, estableciendo así relaciones de comunicación e interacción con otros usuarios.</p>
        <img src="images/mision2.svg" alt="mision2">

    </div>

    <div class="vision">
        <h1>Vision</h1>
        <div class="linea"></div>
        <br>
        <p>Ser la mejor plataforma tecnologica de trabajo colaborativo enfocado a proyectos, impulsando la creatividad, innovacion e invencion de productos o servicios de alta calidad, permitiendo tener un mejor rendimiento productivo, operativo y colaborativo.</p>


    </div>
</section>


<main class="programas p-y1">
    <div class="container">
        <h3 class="text-xs-center font-weight-bold">Nuestros Programas</h3>
        <div class="row">

            <article class="col-md-4">
                <img src="images/LogoPiso.svg" alt="LogoPiso Digno">
                <h3><a href="#">Piso Digno</a></h3>
                <p class="hidden-sm-down">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia natus asperiores quo eaque, reiciendis provident nobis voluptatem. Quos repellat excepturi cupiditate earum exercitationem porro tempore, odit consectetur fugit ipsa facere.</p>
                <a href="#" class="btn btn-secondary hidden-sm-down">Más Informacion</a>
            </article>

            <article class="col-md-4">
                <img src="images/LogoPiso.svg" alt="LogoPiso Digno">

                <h3><a href="#">Despensas</a></h3>
                <p class="hidden-sm-down">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia natus asperiores quo eaque, reiciendis provident nobis voluptatem. Quos repellat excepturi cupiditate earum exercitationem porro tempore, odit consectetur fugit ipsa facere.</p>
                <a href="#" class="btn btn-secondary hidden-sm-down">Más Informacion</a>
            </article>
            <article class="col-md-4">
                <img src="images/LogoPiso.svg" alt="LogoPiso Digno">
                <h3><a href="#">Cooperaticva</a></h3>
                <p class="hidden-sm-down">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia natus asperiores quo eaque, reiciendis provident nobis voluptatem. Quos repellat excepturi cupiditate earum exercitationem porro tempore, odit consectetur fugit ipsa facere.</p>
                <a href="#" class="btn btn-secondary hidden-sm-down">Más Informacion</a>
            </article>
        </div>
    </div>
</main>
@include('layouts/menu/footer')
@endsection
@section('javascripts')

@endsection
