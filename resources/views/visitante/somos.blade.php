@extends('layouts.app') @section('styles')
<link rel="stylesheet" href="{{asset('css/general.css')}}"> @endsection @section('content')
<div class="estilo">
</div>

<div class="container-fluid cabeza">


    <h1 class="subtitulo1 text-xs-center ">¿Quiénes somos?</h1>
    <hr/>
    <br>
    <br>
    <h3>    Somos una gran familia conformada por amigos, líderes sociales y voluntarios cuya afinidad por aportar tiempo, esfuerzo y talento en aras de ayudar a las familias poblanas más necesitadas, nos ha consolidado en un equipo interdisciplinario que ha sabido garantizar el correcto devenir de las metas y objetivos de la asociación.
    </h3>

</div>
<section class="container-fluid somos text-xs-center">
    <br>
    <h1>Los miembros que actualmente encabezan esta noble labor son:
    </h1>
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#somos').addClass('active');
    });

</script>
@endsection
