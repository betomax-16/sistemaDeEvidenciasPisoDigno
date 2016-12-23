<div class="row">
  @foreach($beneficiados as $beneficiado)
  @php($fotos = $beneficiado->fotos)
  <div class="col-md-4" id="evidencia{{$beneficiado->idHogar}}">
    <div class="container-image image_wrapper">
      @if(!Auth::guest())
      <div class="remove" id="{{$beneficiado->idHogar}}"><img src="{{asset('imagenes/aplicacion/cerrar24x24.png')}}" alt=""></div>
      @endif
      <div class="secundario">
        @if(count($fotos)>=1)
          <div class="item"><img src="{{asset('imagenes/evidencias').'/'.$fotos[0]->nombreArchivo}}" alt="{{$fotos[0]->tipo}}" data-toggle="modal" data-target="#myModal"></div>
        @else
          <div class="item"><center><img src="{{asset('imagenes/evidencias/foto.png')}}" alt="Sin definir"></center></div>
        @endif
        @if(count($fotos)>=2)
          <div class="item"><img src="{{asset('imagenes/evidencias').'/'.$fotos[1]->nombreArchivo}}" alt="{{$fotos[1]->tipo}}" data-toggle="modal" data-target="#myModal"></div>
        @else
          <div class="item"><center><img src="{{asset('imagenes/evidencias/foto.png')}}" alt="Sin definir"></center></div>
        @endif
      </div>
      <div class="primario">
        @if(count($fotos)>=3)
          <div class="item"><center><img src="{{asset('imagenes/evidencias').'/'.$fotos[2]->nombreArchivo}}" alt="{{$fotos[2]->tipo}}" data-toggle="modal" data-target="#myModal"></center></div>
        @else
          <div class="item"><center><img src="{{asset('imagenes/evidencias/foto.png')}}" alt="Sin definir"></center></div>
        @endif
      </div>
      <a href="{{route((!Auth::guest()) ? 'evidencia.edit' : 'evidencia.ver', $beneficiado->idHogar)}}">
        <div class="titulo">
          <div class="item">{{$beneficiado->familia}}</div>
        </div>
      </a>
    </div>
  </div>
  @endforeach
</div>
<div class="row">
  <div class="col-md-12">
    {{ $beneficiados->links() }}
  </div>
</div>
