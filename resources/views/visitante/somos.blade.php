@extends('layouts.app') @section('styles')
<link rel="stylesheet" href="{{asset('css/general.css')}}">
<link rel="stylesheet" href="{{asset('css/footer/footer.css')}}">
<style media="screen">
  .somos{
    margin-bottom: 20px;
  }
</style>
@endsection @section('content')
<div class="estilo">
</div>

<div class="container cabeza">


    <h1 class="subtitulo1 text-xs-center ">¿Quiénes somos?</h1>
    <hr/>
    <br>
    <br>
    <h3 class="text-justify">    Somos una gran familia conformada por amigos, líderes sociales y voluntarios cuya afinidad por aportar tiempo, esfuerzo y talento en aras de ayudar a las familias poblanas más necesitadas, nos ha consolidado en un equipo interdisciplinario que ha sabido garantizar el correcto devenir de las metas y objetivos de la asociación.
    </h3>

</div>
<section class="container somos text-justify">
    <br>
    <h1>Los miembros que actualmente encabezan esta noble labor son:
    </h1>
    <div class="persona1 wow fadeIn">
        <div class=" col-xs-12 col-md-5 text-xs-center">
            <img class="img-fluid" src="{{asset('imagenes/somos/Recurso1.png')}}" alt="">
        </div>
        <div class="citas col-xs-12 offset-md-1 col-md-6">
            <spam><h2>Presidente</h2></spam>
            <br>
            <p>“Al final, lo único que importa es trascender por vía de nuestros actos, no importa que tan grandes sean estos, siempre y cuando reflejen absoluta gratitud hacia los demás”.</p>

        </div>
    </div>
    <div class="persona2 wow fadeIn">
        <div class="imagen col-xs-12 offset-md-1 col-md-5 text-xs-center">
            <img class="img-fluid" src="{{asset('imagenes/somos/Recurso2.png')}}" alt="">
        </div>
        <div class="citas col-xs-12 col-md-6">
            <spam><h2>Coordinadora de Proyectos</h2></spam>
            <br>
            <p>“Servir al prójimo es una bendición que nutre la inmortalidad del alma”.</p>
        </div>
    </div>
    <div class="persona3 wow fadeIn">
        <div class="col-xs-12 col-md-5 text-xs-center">
            <img class="img-fluid" src="{{asset('imagenes/somos/Recurso3.png')}}" alt="">
        </div>
        <div class="citas col-xs-12 offset-md-1 col-md-6">
            <h2>Apoderado Legal y Director General de Proyectos</h2>
            <br>
            <p>“Poco a poco, pequeños actos de humanidad que parecían agotarse en un instante, se vuelven enormes bendiciones que transforman toda una vida”.</p>
        </div>
    </div>
    <div class="imagen persona4 wow fadeIn">
        <div class="imagen col-xs-12 offset-md-1 col-md-5 text-xs-center">
            <img class="img-fluid" src="{{asset('imagenes/somos/persona1.jpg')}}" alt="">
        </div>
        <div class="citas col-xs-12 col-md-6">
            <h2>Coordinadora de Gestión y Enlace con Dependencias y Organismos del Sector Público</h2>
            <br>
            <p>“Una vida sin servir al prójimo, es una vida que, sin duda, no ha alcanzado la plenitud”.</p>
        </div>
    </div>
    <div class="persona5 wow fadeIn">
        <div class="col-xs-12 col-md-5 text-xs-center">
            <img class="img-fluid" src="{{asset('imagenes/somos/Recurso5.png')}}" alt="">
        </div>
        <div class="citas col-xs-12 offset-md-1 col-md-6">
            <h2>Coordinador de Proyectos</h2>
            <br>
            <p>“Servir, virtud que enaltece el espíritu y nos acerca a Dios”.</p>
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
