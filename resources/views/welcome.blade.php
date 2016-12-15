@extends('layouts.app')
@section('content')
    <section class="Bienvenidos text-xs-center">
        <div class="container">
            <div class="row">
                <h1 class="display-3 col-xs-12 col-md-4">Ayudanos <br> a <br> <span>Ayudar</span></h1>
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

@include('layouts/menu/footer')
@endsection
@section('javascripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
<script src="{{asset('js/estilos.js')}}"></script>
@endsection
