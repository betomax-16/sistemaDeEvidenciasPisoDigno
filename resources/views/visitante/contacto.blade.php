@extends('layouts.app') @section('styles')
<link rel="stylesheet" href="{{asset('css/general.css')}}">
<link rel="stylesheet" href="{{asset('css/set1.css')}}">

<link rel="stylesheet" href="{{asset('css/contactanos.css')}}"> @endsection @section('content')
<div class="paginas-internas">
    <div class="texto-encabezado text-xs-center bienvenidos">
        <div class="container">
            @include('flash::message')
            <h1 class="display-4 wow bounceIn">Contacto</h1>
            <p class="wow bounceIn" data-wow-delay=".3s">Estamos listos para ayudar</p>
        </div>
    </div>
    </section>
    <section class="ruta p-2">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-xs-right">
                </div>
            </div>
        </div>
    </section>
    <main class="p-1">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="m-b-2">Formulario de contacto</h2>
                    <div class="col-md-12">
                        <span class="input input--hoshi">
					    <input class="input__field input__field--hoshi" type="text" id="input-4" />
					    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
						    <span class="input__label-content input__label-content--hoshi">Nombre</span>
                        </label>
                        </span>
                    </div>

                    <div class="col-md-12">
                        <span class="input input--hoshi">
					    <input class="input__field input__field--hoshi" type="text" id="input-4" />
					    <label class="input__label input__label--hoshi input__label--hoshi-color-2" for="input-4">
						    <span class="input__label-content input__label-content--hoshi ">Asunto</span>
                        </label>
                        </span>
                    </div>

                    <div class="col-md-12">
                        <span class="input input--hoshi">
					    <input class="input__field input__field--hoshi" type="text" id="input-4" />
					    <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="input-4">
						    <span class="input__label-content input__label-content--hoshi">Mensaje</span>
                        </label>
                        </span>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-8 offset-md-4">
                            {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!} {!! Form::reset('Limpiar', ['class' => 'btn btn-secondary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="col-md-4">
                    <h3>Detalles de contacto</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque laborum commodi suscipit vitae eius perferendis consequuntur? Modi nihil aliquam, quas deserunt vitae atque suscipit ratione rerum eveniet. Qui, adipisci ad.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque laborum commodi suscipit vitae eius perferendis consequuntur? Modi nihil aliquam, quas deserunt vitae atque suscipit ratione rerum eveniet. Qui, adipisci ad.</p>
                </div>
            </div>
        </div>
    </main>

</div>

@endsection @section('javascripts')
<script src="{{asset('js/Hoshi.js')}}"></script> @endsection
