@extends('layouts.app') @section('styles')
<link rel="stylesheet" href="{{asset('jquery-ui/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('css/evidencia.css')}}">
<link rel="stylesheet" href="{{asset('css/general.css')}}">
<link rel="stylesheet" href="{{asset('css/cs-skin-underline.css')}}">
<link rel="stylesheet" href="{{asset('css/evidencias/bookblock.css')}}">
<link rel="stylesheet" href="{{asset('css/evidencias/demo5.css')}}" />
<link rel="stylesheet" href="{{asset('css/lightbox.min.css')}}">
@endsection @section('content')
<div class="container-fluid">
    <div class="row" id="cabecera">
        <div class="col-md-12">
          <h1 class="text-xs-center"><b>Evidencias:</b> <span id='proyecto'>{{$proyecto->nombre}}</span></h1>
          <div class="row">
            <div class="col-md-3">
              {!! Form::number('año', Carbon\Carbon::now()->format('Y'), ['id' => 'año', 'class' => 'form-control', 'placeholder' => 'Año']) !!}
            </div>
            <div class="col-md-3">
              {!! Form::select('region', ['MUNICIPIO' => 'Municipio', 'LOCALIDAD' => 'Localidad'],'MUNICIPIO', ['class' => 'form-control', 'id' => 'region']) !!}
            </div>
            <div class="col-md-4">
              {!! Form::text('nombreLugar', $municipio ? $municipio->nombre : null, ['class' => 'form-control', 'id' => 'nombreLugar', 'autocomplete' => 'off', 'placeholder' => 'Lugar']) !!}
            </div>
            <div class="col-md-2">
              <center>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button id="btnBuscar" type="button" class="btn blue-inverse"><i class="fa fa-search" aria-hidden="true"></i></button>
                  <a href="#" id="btnExcel" class="btn green-inverse"><i class="fa fa-download" aria-hidden="true"></i></a>
                </div>
              </center>
            </div>
          </div>
        </div>
    </div>
    <hr>
    <div class="row" id="evidencias">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="bb-custom-grid text-xs-center" id="bb-custom-grid">
              @if($beneficiados) @include('layouts/templates/Evidencias') @else
              <h1 class="display-4 text-md-center">Sin evidencias</h1> @endif
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12" id="pagination">
            @if($beneficiados) @include('layouts/templates/pagination')@endif
          </div>
        </div>
      </div>
      {!! Form::open(['route' => ['evidencia.destroy', 'ID_HOGAR'], 'method' => 'DELETE', 'id' => 'form-delete']) !!} {!! Form::close() !!}
    </div>
</div>
@endsection @section('javascripts')
<script src="{{asset('js/lightbox-plus-jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/Evidencias/buscarLocalidadEvidencia.js')}}"></script>
<script type="text/javascript" src="{{asset('js/Evidencias/eliminarEvidencia.js')}}"></script>
<script src="{{asset('js/Evidencias/design/modernizr.custom.js')}}"></script>
<script src="{{asset('js/Evidencias/design/jquerypp.custom.js')}}"></script>
<script src="{{asset('js/Evidencias/design/jquery.bookblock.js')}}"></script>
<script type="text/javascript">
var token = '{{ Session::token() }}';
var estado = '{{ Session::get("estado") }}';
var proyecto = '{{ Session::get("proyecto") }}';
var download = "{{route('evidencia.excel',['PROYECTO','ANIO','REGION','LUGAR'])}}";
var Page = (function() {

  var $grid = $( '#bb-custom-grid' );

  return {
    init : function() {
      $grid.find( 'div.bb-bookblock' ).each( function( i ) {

        var $bookBlock = $( this ),
          $nav = $bookBlock.next().children( 'span' ),
          bb = $bookBlock.bookblock( {
            speed : 600,
            shadows : false
          } );

        // add navigation events
        $nav.each( function( i ) {
          $( this ).on( 'click touchstart', function( event ) {
            var $dot = $( this );
            $nav.removeClass( 'bb-current' );
            $dot.addClass( 'bb-current' );
            $bookBlock.bookblock( 'jump', i + 1 );
            return false;
          } );
        } );

        // add swipe events
        $bookBlock.children().on( {
          'swipeleft' : function( event ) {
            $bookBlock.bookblock( 'next' );
            return false;
          },
          'swiperight' : function( event ) {
            $bookBlock.bookblock( 'prev' );
            return false;
          }

        } );

      } );
    }
  };

})();
	Page.init();
</script>
@endsection
