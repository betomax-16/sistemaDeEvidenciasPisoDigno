@extends('layouts.app') @section('styles')
<link rel="stylesheet" href="{{asset('css/general.css')}}">
<link rel="stylesheet" href="{{asset('css/set1.css')}}">
<link rel="stylesheet" href="{{asset('css/contactanos.css')}}">
@endsection @section('content')
<div class="paginas-internas espacioPagina">
    <main class="p-1">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1 style="color:#c8ccd0;"><b>Formulario de contacto</b></h1>
                    {!! Form::open(['route' => 'enviarContacto', 'method' => 'POST']) !!}

                    <span class="input input--hoshi">
                      {!! Form::text('nombre', old('nombre'), ['class' => 'input__field input__field--hoshi', 'autocomplete' => 'off']) !!}
        					    <label class="input__label {{ $errors->has('nombre') ? ' error' : 'input__label--hoshi input__label--hoshi-color-1' }}" for="input-4">
        						    <span class="input__label-content {{ ($errors->has('nombre') || old('nombre')) ? ' arriba' : 'input__label-content--hoshi' }}">Nombre</span>
                      </label>
                    </span>
                    @if ($errors->has('nombre'))
                      <span class="label-error">
                          <strong>{{ $errors->first('nombre') }}</strong>
                      </span>
                    @endif

                    <span class="input input--hoshi">
                    {!! Form::tel('telefono', old('telefono'), ['class' => 'input__field input__field--hoshi', 'autocomplete' => 'off']) !!}
      					    <label class="input__label {{ $errors->has('telefono') ? ' error' : 'input__label--hoshi input__label--hoshi-color-2' }}" for="input-4">
      						    <span class="input__label-content {{ ($errors->has('telefono') || old('telefono')) ? ' arriba' : 'input__label-content--hoshi' }}">Teléfono</span>
                    </label>
                    </span>
                    @if ($errors->has('telefono'))
                      <span class="label-error">
                          <strong>{{ $errors->first('telefono') }}</strong>
                      </span>
                    @endif

                    <span class="input input--hoshi">
                    {!! Form::email('email', old('email'), ['class' => 'input__field input__field--hoshi', 'autocomplete' => 'off']) !!}
      					    <label class="input__label {{ $errors->has('email') ? ' error' : 'input__label--hoshi input__label--hoshi-color-3' }}" for="input-4">
      						    <span class="input__label-content {{ ($errors->has('email') || old('email')) ? ' arriba' : 'input__label-content--hoshi' }}">Email</span>
                    </label>
                    </span>
                    @if ($errors->has('email'))
                      <span class="label-error">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                    @endif

                    <span class="input input--hoshi">
                    {!! Form::text('asunto', old('asunto'), ['class' => 'input__field input__field--hoshi', 'autocomplete' => 'off']) !!}
      					    <label class="input__label {{ $errors->has('asunto') ? ' error' : 'input__label--hoshi input__label--hoshi-color-4' }}" for="input-4">
      						    <span class="input__label-content {{ ($errors->has('asunto') || old('asunto')) ? ' arriba' : 'input__label-content--hoshi' }}">Asunto</span>
                    </label>
                    </span>
                    @if ($errors->has('asunto'))
                      <span class="label-error">
                          <strong>{{ $errors->first('asunto') }}</strong>
                      </span>
                    @endif

                    <span class="input input--hoshi">
                    {!! Form::textarea('mensaje', old('mensaje'), ['class' => 'input__field input__field--hoshi', 'autocomplete' => 'off', 'size' => '50x4']) !!}
      					    <label class="input__label {{ $errors->has('mensaje') ? ' error' : 'input__label--hoshi input__label--hoshi-color-5' }}" for="input-4">
      						    <span class="input__label-content {{ ($errors->has('mensaje') || old('mensaje')) ? ' arriba' : 'input__label-content--hoshi' }}">Mensaje</span>
                    </label>
                    </span>
                    @if ($errors->has('mensaje'))
                      <span class="label-error">
                          <strong>{{ $errors->first('mensaje') }}</strong>
                      </span>
                    @endif

                    <div class="col-md-10 offset-md-1">
                      <div class="buttons">
                        {!! Form::submit('Enviar', ['class' => 'btn blue']) !!}
                        {!! Form::reset('Limpiar', ['class' => 'btn purple', 'id' => 'reset']) !!}
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
<script src="{{asset('js/Contacto/Hoshi.js')}}"></script> @endsection
