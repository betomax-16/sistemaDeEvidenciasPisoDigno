@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{asset('jquery-ui/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('css/general.css')}}">
<style media="screen">
.box{
  height: 250px;
  overflow: hidden;
}
.box img{
	height: 100%;
	width: 100%;
	object-fit:cover;
	-o-object-fit:cover;
}

</style>
@endsection
@section('content')
<div class="container espacioPagina">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="overflow:auto;">
                  <div class="row">
                    <div class="col-xs-3 col-sm-2 col-md-1">
                      <a href="{{ URL::previous() }}" class="btn btn-success btn-circle"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    </div>
                    <div class="col-xs-9 col-sm-10 col-md-11">
                      <h1 class="hidden-xs-down">Familia: {{$beneficiado->familia}}</h1>
                      <h5 class="hidden-sm-up">Familia: {{$beneficiado->familia}}</h5>
                      <h5 class="hidden-xs-down">Proyecto: {{Session::get('proyecto')}}</h5>
                      <h6 class="hidden-sm-up">Proyecto: {{Session::get('proyecto')}}</h6>
                      <h6 class="text-md-right hidden-xs-down">Municipio: {{$municipio->nombre}} / Localidad: {{$localidad->nombre}} / Fecha: {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$beneficiado->created_at)->format('Y-m-d')}}</h6>
                      <span class="hidden-sm-up">Municipio: {{$municipio->nombre}} / Localidad: {{$localidad->nombre}} / Fecha: {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$beneficiado->created_at)->format('Y-m-d')}}</span>
                    </div>
                  </div>
                </div>
                <div class="card-block">
                  <div id="fotos" class="row">
                    @php($fotos = $beneficiado->fotos)
                    @php($col = 0)
                    @if(count($fotos) == 1)
                      @php($col = 12)
                    @elseif(count($fotos) == 2)
                      @php($col = 6)
                    @elseif(count($fotos) > 2)
                      @php($col = 4)
                    @endif
                    @foreach($fotos as $foto)
                      <div class="col-md-{{$col}}">
                          <center><img id="{{$foto->idFoto}}" alt="{{$foto->tipo}}" src="{{asset('imagenes/evidencias').'/'.$foto->nombreArchivo}}" class="img-thumbnail img-fluid box" data-toggle="modal" data-target="#myModal"></img></center>
                      </div>
                    @endforeach
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <img id="foto-modal" src="#" class="img-thumbnail img-responsive"></img>
      </div>
    </div>
  </div>
</div>
@endsection
@section('javascripts')
<script type="text/javascript" src="{{asset('jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/Evidencias/verFoto.js')}}"></script>
<script type="text/javascript">
  var token = '{{ Session::token() }}';
  var imageDefault = '{{asset("imagenes/evidencias/foto.png")}}'
</script>
@endsection
