@extends('layouts.app') @section('styles')
<link rel="stylesheet" href="{{asset('jquery-ui/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('css/evidencia.css')}}">
<link rel="stylesheet" href="{{asset('css/general.css')}}">
<link rel="stylesheet" href="{{asset('css/set1.css')}}">
<link rel="stylesheet" href="{{asset('css/cs-select.css')}}">
<link rel="stylesheet" href="{{asset('css/cs-skin-underline.css')}}">
<link rel="stylesheet" href="{{asset('css/evidencias/bookblock.css')}}">
<link rel="stylesheet" href="{{asset('css/evidencias/demo5.css')}}" />
<link rel="stylesheet" href="{{asset('css/lightbox.min.css')}}">@endsection @section('content')
<div class="container-fluid espacioPagina">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1>Buscar Evidencias</h1>
                <h4 style="display:inline"><span id='proyecto'>{{$proyecto->nombre}}</span>,  Entidad: {{$estado->nombre}}</h4>
    					</div>
                @if(!Auth::guest())
                <a href="{{route('evidencia.create')}}" class="btn green-inverse" style="width:100%">Agregar Evidencia</a> @endif
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-4 " style="padding:5px">
                          <span class="input input--hoshi">
                            {!! Form::number('año', Carbon\Carbon::now()->format('Y'), ['id' => 'año', 'class' => 'input__field input__field--hoshi']) !!}
                            <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                              <span class="input__label-content arriba">Año</span>
                            </label>
                          </span>
                        </div>
                        <div class="col-md-4" style="padding:5px">
                            {!! Form::select('region', ['MUNICIPIO' => 'Municipio', 'LOCALIDAD' => 'Localidad'],'MUNICIPIO', ['class' => 'cs-select cs-skin-underline', 'id' => 'region', 'style' => 'display:none;']) !!}
                        </div>
                        <div class="col-md-4  " style="padding:5px">
                          <div class="row">
                            <div class="col-md-9">
                              <span class="input input--hoshi">
                                {!! Form::text('nombreLugar', $municipio ? $municipio->nombre : null, ['class' => 'input__field input__field--hoshi', 'id' => 'nombreLugar', 'autocomplete' => 'off']) !!}
                  					    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  						    <span class="input__label-content input__label-content--hoshi">Lugar</span>
                                </label>
                              </span>
                            </div>
                            <div class="col-md-3">
                              <center>
                              <div class="btn-group" role="group" aria-label="Basic example" style="margin-top:19px;">
                                <button id="btnBuscar" type="button" class="btn blue-inverse"><i class="fa fa-search" aria-hidden="true"></i></button>
                                <a href="#" id="btnExcel" class="btn green-inverse"><i class="fa fa-download" aria-hidden="true"></i></a>
                              </div>
                            </center>
                            </div>
                          </div>
                        </div>
                    </div>
                </div><hr>
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
    </div>
</div>
@endsection @section('javascripts')
<script src="{{asset('js/lightbox-plus-jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/Contacto/Hoshi.js')}}"></script>
<script type="text/javascript" src="{{asset('js/select/classie.js')}}"></script>
<script type="text/javascript" src="{{asset('js/select/selectFx.js')}}"></script>
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
