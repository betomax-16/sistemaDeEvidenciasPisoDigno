@extends('layouts.app') @section('styles')
<link rel="stylesheet" href="{{asset('css/general.css')}}"> @endsection @section('content')
<link rel="stylesheet" href="{{asset('css/contactanos.css')}}">

<div class="paginas-internas  ">
    <div class="texto-encabezado text-xs-center bienvenidos">

        <div class="container">
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


                    <form action="#">

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label">Nombre</label>

                            <div class="col-md-8">
                                <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre" data-toggle="tooltip" data-placement="top" title="Ingrese su nombre completo">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label">Email</label>

                            <div class="col-md-8">
                                <input class="form-control" type="text" id="email" name="email" placeholder="Ingrese su email" data-toggle="tooltip" data-placement="top" title="Ingrese su email">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="mensaje" class="col-md-4 col-form-label">Mensaje</label>

                            <div class="col-md-8">
                                <textarea class="form-control" rows="5" id="mensaje" name="mensaje" placeholder="Ingrese su mensaje" data-toggle="tooltip" data-placement="top" title="Ingrese un mensaje"></textarea>

                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                                <button type="reset" class="btn btn-secondary">Limpiar</button>
                            </div>
                        </div>
                    </form>




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
@endsection @section('javascripts') @endsection
