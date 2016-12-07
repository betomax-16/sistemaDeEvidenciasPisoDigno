@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{asset('css/welcome.css')}}">
@endsection
@section('slideshow')
<div class="container">
    <div class="col-md-12">
        <div id="Carousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#Carousel" data-slide-to="0" class="active"></li>
            <li data-target="#Carousel" data-slide-to="1"></li>
            <li data-target="#Carousel" data-slide-to="2"></li>
          </ol>

          <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="{{asset('imagenes/aplicacion/wallpaper1.jpg')}}" class=" slideshow">
                <div class="carousel-caption">
                    <h2>Registra proyectos</h2>
                    <p class="res">Registra tus propios proyectos en diversos eventos</p>
                </div>
            </div>

            <div class="item">
                <img src="{{asset('imagenes/aplicacion/wallpaper2.jpg')}}" class=" slideshow">
                <div class="carousel-caption">
                    <h2>Sé un colaborador</h2>
                    <p class="res">Podras colaborar en diversos proyectos</p>
                </div>
            </div>

            <div class="item">
                <img src="{{asset('imagenes/aplicacion/wallpaper3.jpg')}}" class="slideshow">
                <div class="carousel-caption">
                    <h2>Innova</h2>
                    <p class="res">Que nada te detenga a innovar</p>
                </div>
            </div>

          <a class="left carousel-control" href="#Carousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
          </a>

          <a class="right carousel-control" href="#Carousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Siguinte</span>
          </a>
        </div>
    </div>
</div>
@endsection
@section('about')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Acerca de</h1>
            <p>Red Colaborativa es una plataforma dirigida al control y seguimiento detallado de proyectos destinado a eventos, congresos y concursos en los cuales es complicado llevar un control de los mismos, su objetivo fundamental es la busqueda de colaboradores que ayuden a impulsar el desarrollo de calidad e innovación de los proyectos tecnológicos.</p>
            <br><p>Las caracteristicas que distinguen a Red Colaborativa son:</p>
        </div>
    </div>
    <br>
    <br>

    <div class="row">
        <div class="col-md-4">
            <div align="center">
                <img src="{{asset('imagenes/aplicacion/about1.jpg')}}" class="img-responsive img-rounded img">
            </div>
            <br>
            <h4>Control y seguimiento de los proyectos</h4>
        </div>
        <div class="col-md-4">
            <div align="center">
                <img src="{{asset('imagenes/aplicacion/about2.png')}}" class="img-responsive img-rounded img">
            </div>
            <br>
            <h4>Permite la colaboracion en otros proyectos</h4>
        </div>
        <div class="col-md-4">
            <div align="center">
                <img src="{{asset('imagenes/aplicacion/about3.jpg')}}" class="img-responsive img-rounded img">
            </div>
            <br>
            <h4>Listado de acontecimientos o eventos próximos</h4>
        </div>
    </div>
    <hr>
    <div class="row " >
        <div class="col-md-5 col-md-offset-1">
            <h1>Mision</h1>
            <p>La misión de Red Colaborativa es ayudar y ser una buena opción para la organización de eventos al crear, publicar, gestionar y difundir todo tipo de proyectos tecnologicos para fomentar e impulsar un entorno colaborativo de investigación tecnológica, científica, etc. <br>
A la vez ser una herramienta flexible para adaptarse a eventos de acuerdo a las necesidades, estableciendo así relaciones de comunicación e interacción con otros usuarios.</p>
        </div>

        <div class="col-md-5 col-md-offset-1">
            <div align="center">
                <img src="{{asset('imagenes/aplicacion/mision.jpg')}}" class="img-responsive img1">
            </div>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-5 col-md-offset-1">
            <div align="center">
                <img src="{{asset('imagenes/aplicacion/vision.jpg')}}" class="img-responsive img1">
            </div>
        </div>

        <div class="col-md-5 col-md-offset-1">
            <h1>Vision</h1>
            <p>Ser la mejor plataforma tecnologica de trabajo colaborativo enfocado a proyectos, impulsando la creatividad, innovacion e invencion de productos o servicios de alta calidad, permitiendo tener un mejor rendimiento productivo, operativo y colaborativo.</p>
        </div>
    </div>
</div>
@endsection
@section('footer')
<div>
    <br>
    <br>
    <div class="panel panel-default">
        <div class="panel-footer">
            <h5>Copyright &copy;- Piso Digno 2016</h5>
        </div>
    </div>
@endsection
