@extends('layouts.app') @section('styles')
<link rel="stylesheet" href="{{asset('css/general.css')}}">
<style media="screen">
  h1{
    border-radius: 25px 0 25px 0;
    color: #fff;
  }
  .donante{
    min-height: 100px;
    background: rgba(245, 237, 198, 0.82);
    border-radius: 25px;
    margin-bottom: 35px;
    padding-bottom: 20px;
  }
  .tarjeta{
    min-height: 100px;
    background: rgba(129, 162, 206, 0.82);
    border-radius: 25px;
    margin-bottom: 35px;
    padding-bottom: 20px;
  }
  .donacion{
    min-height: 100px;
    background: rgba(232, 189, 232, 0.82);
    border-radius: 25px;
    margin-bottom: 35px;
    padding-bottom: 20px;
  }
  .donante h1{
    background: #ffe76c;
    border: 3px solid rgba(218, 189, 40, 0.67);
  }
  .tarjeta h1{
    background: #3e74b9;
    border: 3px solid rgb(55, 89, 123);
  }
  .donacion h1{
    background: #c392c2;
    border: 3px solid rgb(134, 97, 133);
  }
  .donacion .cantidades{
    display: flex;
    margin: 0 35px 5px 35px;
  }
  .cantidades button{
    flex: 1 1 auto;
    color: #6c6c6c;
    background: #fff;
    text-align: center;
    padding: 4px 0;
    box-shadow: 3px 4px 1px 0px rgba(0, 0, 0, 0.1);
  }
  .form-group{
    margin: 0 35px;
  }
  .donar{
    margin-top: 15px;
  }
</style>
@endsection @section('content')
@include('flash::message')
  <div class="container espacioPagina marco">

    <div class="row">
      <div class="col-md-12">
        <div class="donante">
          <h1 class="titulo4 text-xs-center">Datos del donador</h1>
          <div class="form-group">
            {!! Form::label('nombre', 'Nombre') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control ', 'autocomplete' => 'off', 'autofocus']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('apellidoPaterno', 'Apellido Paterno') !!}
            {!! Form::text('apellidoPaterno', null, ['class' => 'form-control ', 'autocomplete' => 'off']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('apellidoMaterno', 'Apellido Materno') !!}
            {!! Form::text('apellidoMaterno', null, ['class' => 'form-control ', 'autocomplete' => 'off']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', null, ['class' => 'form-control ', 'autocomplete' => 'off']) !!}
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="tarjeta">
          <h1 class="titulo4 text-xs-center">Datos de la tarjeta</h1>
          <div class="form-group">
            {!! Form::label('nombreTarjeta', 'Nombre en la Tarjeta') !!}
            {!! Form::text('nombreTarjeta', null, ['class' => 'form-control ', 'autocomplete' => 'off']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('numeroTarjeta', 'Número de la Tarjeta') !!}
            {!! Form::text('numeroTarjeta', null, ['class' => 'form-control ', 'autocomplete' => 'off']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('fechaVencimiento', 'Fecha de Vencimiento') !!}
            {!! Form::select('mes', ['' => 'MES', '1' => '01', '2' => '02', '3' => '03', '4' => '04', '5' => '05', '6' => '06', '7' => '07', '8' => '08', '9' => '09', '10' => '10', '11' => '11', '12' => '12'],'', ['class' => 'form-control', 'id' => 'mes']) !!}
            {!! Form::select('anio', ['' => 'AÑO', '2017' => '2017'],'', ['class' => 'form-control', 'id' => 'anio']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('codigo', 'Código de seguridad') !!}
            {!! Form::text('codigo', null, ['class' => 'form-control ', 'autocomplete' => 'off']) !!}
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-12">
            <div class="donacion">
              <h1 class="titulo4 text-xs-center ">¿Cuánto le gustaría donar?</h1>
              <div class="cantidades">
                <button type="button" name="button">$50</button>
                <button type="button" name="button">$100</button>
                <button type="button" name="button">$200</button>
                <button type="button" name="button">$500</button>
                <button type="button" name="button">Otro</button>
              </div>
              <div class="form-group">
                {!! Form::text('monto', null, ['class' => 'form-control ', 'placeholder' => '$0.00', 'autocomplete' => 'off']) !!}
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-xs-center donar">
            <button type="button" name="button" class="btn purple-inverse">Donar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
 @include('layouts/menu/footer')
@endsection @section('javascripts')
<script type="text/javascript">
  $(document).ready(function () {
    $('#donar').addClass('active');
  });
</script>
@endsection
