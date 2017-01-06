
      @if(count($beneficiados) > 0)
        @foreach($beneficiados as $beneficiado)
          @php($fotos = $beneficiado->fotos)
          <li>
            @if(!Auth::guest())
              <div class="remove" id="{{$beneficiado->idHogar}}"><img src="{{asset('imagenes/aplicacion/cerrar24x24.png')}}" alt=""></div>
            @endif
            @if(!Auth::guest())
              <a href="{{route('evidencia.edit', $beneficiado->idHogar)}}"><h3>{{$beneficiado->familia}}</h3></a>
            @else
              <h3>{{$beneficiado->familia}}</h3>
            @endif
            <div class="bb-bookblock">
              @foreach($fotos as $foto)
                <div class="bb-item"><a href="{{asset('imagenes/evidencias').'/'.$foto->nombreArchivo}}" data-lightbox="{{$foto->idHogar}}" data-title="{{$foto->created_at}}"><img src="{{asset('imagenes/evidencias').'/'.$foto->nombreArchivo}}" alt="{{$foto->tipo}}"/></a></div>
              @endforeach
            </div>
            <nav>
              @foreach($fotos as $foto)
                @if($foto->tipo == 'PISO_ORIGINAL')
                  <span class="bb-current"></span>
                @else
                  <span></span>
                @endif
              @endforeach
            </nav>
          </li>
        @endforeach
    @else
      <h1 class="display-4 text-md-center" style="overflow:auto;">No se encontraron evidencias.</h1>
    @endif
