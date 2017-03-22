
      @if(count($beneficiados) > 0)
        @foreach($beneficiados as $beneficiado)
          @php($localidad = App\Localidad::find($beneficiado->idLocalidad))
          @php($municipio = App\Municipio::find($localidad->idMunicipio))
          @php($count=0)
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
                <div class="bb-item">
                  <a href="{{asset('imagenes/evidencias').'/'.$foto->nombreSanitizado}}" data-lightbox="{{$foto->idHogar}}" data-title="{{'Municipio: '.$municipio->nombre.' / Localidad: '.$localidad->nombre.' / '.$foto->created_at}}">
                    <img src="{{asset('imagenes/evidencias').'/'.$foto->nombreSanitizado}}" alt="{{$foto->tipo}}"/>
                  </a>
                </div>
              @endforeach
            </div>
            <nav>
              @foreach($fotos as $foto)
                @php($count++)
                @if($count < 5)
                  @if($foto->tipo == 'PISO_ORIGINAL')
                    <span class="bb-current"></span>
                  @else
                    <span></span>
                  @endif
                @endif
              @endforeach
            </nav>
          </li>
        @endforeach
    @else
      <h1 class="display-4 text-md-center" style="overflow:auto;">No se encontraron evidencias.</h1>
    @endif
