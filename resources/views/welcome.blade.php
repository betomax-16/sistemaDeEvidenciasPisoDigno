@extends('layouts.app') @section('content')

<section class="Bienvenidos text-xs-center">
    <div class="container">
        <div class="row">
            <h1 class="display-3 col-xs-12 col-md-4 wow rubberBand">Ayudanos <br> a <br> <span>Ayudar</span></h1>
            <div class="slide offset-md-2 col-md-4 hidden-md-down">
                <p>holi</p>

            </div>

        </div>
        <div class="texto-encavezado ">
            <a href="#" class="btn btn-secondary btn-lg ">Contactanos</a>
        </div>

        <div class="flecha_bajar">
            <a href="#nosotros"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
        </div>
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
        <h2 class="h3 text-xs-center ">¿Que es lo <span>que hacemos?</span></h2>
        <p class="text-xs-center">
            Ayudandanos a ayudar
        </p>
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
                    <img src="{{asset('imagenes/aplicacion/Bivienda.svg')}}" alt="">
                    <div class="contenedor-eleccion">
                        <h4>Entregamos despensas </h4>
                        <p class="hidden-md-down">A las Familias de escasos recursos se les entrega una despensa cada mes.</p>
                    </div>
                </li>
                <li>
                    <img src="{{asset('imagenes/aplicacion/Bivienda.svg')}}" alt="">
                    <div class="contenedor-eleccion">
                        <h4>Ayudamos a los menos aforunados</h4>
                        <p class="hidden-md-down">Se entregan, sillas de ruedas, bastones y demas a quienes mas lo necesitan.</p>
                    </div>
                </li>
            </ul>

            <div class=" mision hidden-md-down col-lg-4  wow tada">
                <img src="{{asset('imagenes/aplicacion/Bivienda.svg')}}" alt="mision">
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
                    <img src="{{asset('imagenes/aplicacion/Bivienda.svg')}}" alt="">
                    <div class="contenedor-eleccion">
                        <h4>Entregamos despensas </h4>
                        <p class="hidden-md-down">A las Familias de escasos recursos se les entrega una despensa cada mes.</p>
                    </div>

                </li>
                <li>
                    <img src="{{asset('imagenes/aplicacion/Bivienda.svg')}}" alt="">
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
                    <img src="{{asset('imagenes/aplicacion/Bivienda.svg')}}" alt="Educacion">
                </div>
                <br>
                <div class="contenido">
                    <h2><span>34</span></h2>
                    <br>
                    <p>Campaas Ganadas</p>
                </div>
            </div>
            <div class="cajas col-xs-6  col-md-3 offset-md-0">
                <div class="icono">
                    <img src="{{asset('imagenes/aplicacion/Bivienda.svg')}}" alt="Educacion">
                </div>
                <br>
                <div class="contenido">
                    <h2><span>35</span></h2>
                    <br>
                    <p>Campaas Ganadas</p>
                </div>
            </div>
            <br>
            <div class="cajas col-xs-6 col-md-3">
                <div class="icono">
                    <img src="{{asset('imagenes/aplicacion/Bivienda.svg')}}" alt="Educacion">
                </div>
                <br>
                <div class="contenido">
                    <h2><span>36</span></h2>
                    <br>
                    <p>Campaas Ganadas</p>
                </div>
            </div>
            <div class="cajas col-xs-6 col-md-3 offset-md-0">
                <div class="icono">
                    <img src="{{asset('imagenes/aplicacion/Bivienda.svg')}}" alt="Educacion">
                </div>
                <br>
                <div class="contenido">
                    <h2><span>37</span></h2>
                    <br>
                    <p>Campaas Ganadas</p>
                </div>
            </div>
        </div>
    </div>
</section>

<main class="programas p-y1  wow zoomIn">
    <h3 class="titulo text-xs-center font-weight-bold">Nuestros Programas</h3>
    <div class="container">
        <div class="row">

            <article class="col-lg-4" href="#PisoD" data-toggle="modal" data-target="#PisoD">
                <img src=" {{asset('imagenes/aplicacion/Bivienda.svg')}} " alt="LogoPiso Digno">
                <h3><a> Piso Digno</a></h3>
                <p class="hidden-md-down">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia natus asperiores quo eaque, reiciendis provident nobis voluptatem. Quos repellat excepturi cupiditate earum exercitationem porro tempore, odit consectetur fugit ipsa facere.</p>
                <button class="btn btn-secondary hidden-md hidden-md-down">Más Informacion</button>
            </article>

            <article class="col-lg-4">
                <img src="{{asset('imagenes/aplicacion/Bivienda.svg')}}" alt="LogoPiso Digno">
                <h3><a>Despensas</a></h3>
                <p class="hidden-md-down">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia natus asperiores quo eaque, reiciendis provident nobis voluptatem. Quos repellat excepturi cupiditate earum exercitationem porro tempore, odit consectetur fugit ipsa facere.</p>
                <a href="#" class="btn btn-secondary hidden-md-down">Más Informacion</a>
            </article>

            <article class="col-lg-4">
                <img src="{{asset('imagenes/aplicacion/Bivienda.svg')}}" alt="LogoPiso Digno">
                <h3><a>Salud</a></h3>
                <p class="hidden-md-down">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia natus asperiores quo eaque, reiciendis provident nobis voluptatem. Quos repellat excepturi cupiditate earum exercitationem porro tempore, odit consectetur fugit ipsa facere.</p>
                <a href="#" class="btn btn-secondary hidden-md-down">Más Informacion</a>
            </article>
        </div>
    </div>



</main>

@include('layouts/templates/modal') @include('layouts/menu/footer') @endsection @section('javascripts')
<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="{{asset('js/estilos.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
@endsection
