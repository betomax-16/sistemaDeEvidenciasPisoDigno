
      @if(count($beneficiados) > 0)
        @foreach($beneficiados as $beneficiado)
          @php($fotos = $beneficiado->fotos)
          <li>
            @if(!Auth::guest())
              <div class="remove" id="{{$beneficiado->idHogar}}"><img src="{{asset('imagenes/aplicacion/cerrar24x24.png')}}" alt=""></div>
            @endif
            <h3>{{$beneficiado->familia}}</h3>
            <div class="bb-bookblock">
              @foreach($fotos as $foto)
                <div class="bb-item"><a href="#"><img src="{{asset('imagenes/evidencias').'/'.$foto->nombreArchivo}}" alt="{{$foto->tipo}}"/></a></div>
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
