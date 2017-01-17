@extends('layouts.app') @section('styles')
<link rel="stylesheet" href="{{asset('css/odometer-theme-train-station.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/textoPresentacion.css')}}" />
<link rel="stylesheet" href="{{asset('css/style1.css')}}">
<link rel="stylesheet" href="{{asset('css/Estadisticas.css')}}">
<link rel="stylesheet" href="{{asset('css/odometer-theme-train-station.css')}}"> @endsection @section('content')

<section class="container somos text-xs-center">
    <h1>¿Quienes somos?</h1>
    <hr/>
    <br>
    <p>Somos una gran familia conformada por amigos, líderes sociales y voluntarios cuya afinidad por aportar tiempo, esfuerzo y talento en aras de ayudar a las familias poblanas más necesitadas, nos ha consolidado en un equipo interdisciplinario que ha sabido garantizar el correcto devenir de las metas y objetivos de la asociación.
    </p>
    <br>
    <p>Los miembros que actualmente encabezan esta noble labor son:
    </p>
    <div class="persona1 wow fadeIn">
        <div class=" col-xs-12 col-md-5">
            <img class="img-fluid" src="{{asset('imagenes/somos/persona1.jpg')}}" alt="">
        </div>
        <div class="citas col-xs-12 offset-md-1 col-md-6">
            <h2>Diseñador Web</h2>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus animi provident quibusdam ex magnam, inventore incidunt libero, sint quos pariatur itaque voluptates voluptatem dolor. Rerum nesciunt suscipit, beatae cum eius!</p>

        </div>
    </div>
    <div class="persona2 wow fadeIn">
        <div class="imagen col-xs-12 offset-md-1 col-md-5">
            <img class="img-fluid" src="{{asset('imagenes/somos/persona1.jpg')}}" alt="">
        </div>
        <div class="citas col-xs-12 col-md-6">
            <h2>Apoderado Legal y Director General de Proyectos</h2>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus animi provident quibusdam ex magnam, inventore incidunt libero, sint quos pariatur itaque voluptates voluptatem dolor. Rerum nesciunt suscipit, beatae cum eius!</p>
        </div>
    </div>
    <div class="persona3 wow fadeIn">
        <div class="col-xs-12 col-md-5">
            <img class="img-fluid" src="{{asset('imagenes/somos/persona1.jpg')}}" alt="">
        </div>
        <div class="citas col-xs-12 offset-md-1 col-md-6">
            <h2>Coordinadora de Gestión y Enlace con Dependencias y Organismos del Sector Público</h2>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus animi provident quibusdam ex magnam, inventore incidunt libero, sint quos pariatur itaque voluptates voluptatem dolor. Rerum nesciunt suscipit, beatae cum eius!</p>
        </div>
    </div>
    <div class="imagen persona4 wow fadeIn">
        <div class="imagen col-xs-12 offset-md-1 col-md-5">
            <img class="img-fluid" src="{{asset('imagenes/somos/persona1.jpg')}}" alt="">
        </div>
        <div class="citas col-xs-12 col-md-6">
            <h2>Coordinadora de Proyectos</h2>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus animi provident quibusdam ex magnam, inventore incidunt libero, sint quos pariatur itaque voluptates voluptatem dolor. Rerum nesciunt suscipit, beatae cum eius!</p>
        </div>
    </div>
    <div class="persona5 wow fadeIn">
        <div class="col-xs-12 col-md-5">
            <img class="img-fluid" src="{{asset('imagenes/somos/persona1.jpg')}}" alt="">
        </div>
        <div class="citas col-xs-12 offset-md-1 col-md-6">
            <h2>Coordinadora de Proyectos</h2>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus animi provident quibusdam ex magnam, inventore incidunt libero, sint quos pariatur itaque voluptates voluptatem dolor. Rerum nesciunt suscipit, beatae cum eius!</p>
        </div>
    </div>
    <div class="imagen persona6 wow fadeIn">
        <div class="imagen col-xs-12 offset-md-1 col-md-5">
            <img class="img-fluid" src="{{asset('imagenes/somos/persona1.jpg')}}" alt="">
        </div>
        <div class="citas col-xs-12 col-md-6">
            <h2>Coordinadora de Proyectos</h2>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus animi provident quibusdam ex magnam, inventore incidunt libero, sint quos pariatur itaque voluptates voluptatem dolor. Rerum nesciunt suscipit, beatae cum eius!</p>
        </div>
    </div>
</section>










@include('layouts/templates/modal') @include('layouts/menu/footer') @endsection @section('javascripts')
<!-- jQuery first, then Tether, then Bootstrap JS. -->


<script src="{{asset('js/estilos.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('js/odometer.min.js')}}"></script>

@endsection
