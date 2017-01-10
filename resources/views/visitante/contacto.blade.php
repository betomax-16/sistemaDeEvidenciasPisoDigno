@extends('layouts.app') @section('styles')
<link rel="stylesheet" href="{{asset('css/general.css')}}">
<link rel="stylesheet" href="{{asset('css/contactanos.css')}}">
@endsection @section('content')
@include('flash::message')
<div class="paginas-internas">
    <main class="p-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <div class="form-container">
                    <div class="form-header">
                      <h1>Formulario de contacto</h1>
                    </div>
                    <div class="form-body">
                      {!! Form::open(['route' => 'enviarContacto', 'method' => 'POST']) !!}
                      <div class="form-group {{ $errors->has('nombre') ? 'has-danger' : '' }}">
                        <label>Nombre</label>
                        @php($error = $errors->has('nombre') ? 'form-control-danger' : '')
                        {!! Form::text('nombre', old('nombre'), ['class' => 'form-control '.$error, 'autocomplete' => 'off']) !!}
                        @if ($errors->has('nombre'))
                          <div class="message-error">{{ $errors->first('nombre') }}</div>
                        @endif
                      </div>
                      <div class="form-group {{ $errors->has('telefono') ? 'has-danger' : '' }}">
                          <label>Teléfono</label>
                          @php($error = $errors->has('telefono') ? 'form-control-danger' : '')
                          {!! Form::tel('telefono', old('telefono'), ['class' => 'form-control '.$error, 'autocomplete' => 'off']) !!}
                          @if ($errors->has('telefono'))
                            <div class="message-error">{{ $errors->first('telefono') }}</div>
                          @endif
                      </div>
                      <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                        <label>Email</label>
                        @php($error = $errors->has('email') ? 'form-control-danger' : '')
                        {!! Form::email('email', old('email'), ['class' => 'form-control '.$error, 'autocomplete' => 'off']) !!}
                        @if ($errors->has('email'))
                          <div class="message-error">{{ $errors->first('email') }}</div>
                        @endif
                      </div>
                      <div class="form-group {{ $errors->has('asunto') ? 'has-danger' : '' }}">
                        <label>Asunto</label>
                        @php($error = $errors->has('asunto') ? 'form-control-danger' : '')
                        {!! Form::text('asunto', old('asunto'), ['class' => 'form-control '.$error, 'autocomplete' => 'off']) !!}
                        @if ($errors->has('asunto'))
                          <div class="message-error">{{ $errors->first('asunto') }}</div>
                        @endif
                      </div>
                      <div class="form-group {{ $errors->has('mensaje') ? 'has-danger' : '' }}">
                        <label>Mensaje</label>
                        {!! Form::textarea('mensaje', old('mensaje'), ['class' => 'form-control ', 'autocomplete' => 'off', 'size' => '50x4']) !!}
                        @if ($errors->has('mensaje'))
                          <div class="message-error">{{ $errors->first('mensaje') }}</div>
                        @endif
                      </div>
                      <div class="form-group" style="margin-top:25px;">
                        <center>
                          {!! Form::submit('Enviar', ['class' => 'btn green-inverse']) !!}
                          {!! Form::reset('Limpiar', ['class' => 'btn blue-inverse', 'id' => 'reset']) !!}
                        </center>
                      </div>
                      {!! Form::close() !!}
                    </div>
                  </div>
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
<script type="text/javascript">
  $(document).ready(function () {
    $('#contacto').addClass('active');
  });
</script>
@endsection
