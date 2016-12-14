@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{asset('jquery-ui/jquery-ui.min.css')}}">
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
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">
                  <h1>Familia: {{$beneficiado->familia}}</h1>
                  <h5>Proyecto: {{Session::get('proyecto')}}</h5>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12">
                      <h4>Municipio: {{$municipio->nombre}}</h4>
                      <h4>Localidad: {{$localidad->nombre}}</h4>
                      <h4>Fecha: {{$beneficiado->created_at}}</h4>
                    </div>
                  </div>
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
                          <center><img id="{{$foto->idFoto}}" src="{{asset('imagenes/evidencias').'/'.$foto->nombreArchivo}}" class="img-thumbnail img-responsive box" data-toggle="modal" data-target="#myModal"></img></center>
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
      <div class="modal-footer"></div>
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
