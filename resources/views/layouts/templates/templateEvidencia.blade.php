<div class="row">
  @foreach($beneficiados as $beneficiado)
  <div class="col-md-4" id="evidencia{{$beneficiado->idHogar}}">
      <div class="panel panel-primary">
          <div class="panel-heading">
            Familia: <b><span>{{$beneficiado->familia}}</span></b>
            @if(!Auth::guest())
              <button type="button" name="button" class="btn btn-danger" id="{{$beneficiado->idHogar}}" style="float:right; margin-top:-7px; margin-right:-11px;">X</button>
            @endif
          </div>
          <div class="panel-body">
            <a href="{{route((!Auth::guest()) ? 'evidencia.edit' : 'evidencia.ver', $beneficiado->idHogar)}}">
              @php($fotos = count($beneficiado->fotos))
              @if($fotos == 1)
                <div class="row">
                    <div class="col-md-6">
                        <center><img src="{{asset('imagenes/evidencias').'/foto.png'}}" class="img-thumbnail img-responsive box"></img></center>
                    </div>
                    <div class="col-md-6">
                        <center><img src="{{asset('imagenes/evidencias').'/foto.png'}}" class="img-thumbnail img-responsive box"></img></center>
                    </div>
                </div></br>
                <div class="row">
                    <div class="col-md-12">
                        <center><img src="{{asset('imagenes/evidencias').'/'.$beneficiado->fotos[0]->nombreArchivo}}" class="img-thumbnail img-responsive bigbox"></img></center>
                    </div>
                </div>
              @elseif($fotos == 2)
                <div class="row">
                    <div class="col-md-6">
                        <center><img src="{{asset('imagenes/evidencias').'/'.$beneficiado->fotos[0]->nombreArchivo}}" class="img-thumbnail img-responsive box"></img></center>
                    </div>
                    <div class="col-md-6">
                        <center><img src="{{asset('imagenes/evidencias').'/'.$beneficiado->fotos[1]->nombreArchivo}}" class="img-thumbnail img-responsive box"></img></center>
                    </div>
                </div></br>
                <div class="row">
                    <div class="col-md-12">
                        <center><img src="{{asset('imagenes/evidencias').'/foto.png'}}" class="img-thumbnail img-responsive bigbox"></img></center>
                    </div>
                </div>
              @elseif($fotos >= 3)
                <div class="row">
                    <div class="col-md-6">
                        <center><img src="{{asset('imagenes/evidencias').'/'.$beneficiado->fotos[0]->nombreArchivo}}" class="img-thumbnail img-responsive box"></img></center>
                    </div>
                    <div class="col-md-6">
                        <center><img src="{{asset('imagenes/evidencias').'/'.$beneficiado->fotos[1]->nombreArchivo}}" class="img-thumbnail img-responsive box"></img></center>
                    </div>
                </div></br>
                <div class="row">
                    <div class="col-md-12">
                        <center><img src="{{asset('imagenes/evidencias').'/'.$beneficiado->fotos[2]->nombreArchivo}}" class="img-thumbnail img-responsive bigbox"></img></center>
                    </div>
                </div>
              @endif
            </a>
          </div>
      </div>
  </div>
  @endforeach
</div>
<div class="row">
  <div class="col-md-12">
    {{ $beneficiados->links() }}
  </div>
</div>
