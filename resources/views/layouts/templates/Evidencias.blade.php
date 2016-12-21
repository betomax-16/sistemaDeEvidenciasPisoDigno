<i>

</i> @foreach($beneficiados as $beneficiado) @php($fotos = count($beneficiado->fotos))
<button class="fotos col-xs-12 col-md-3 text-xs-center " href="#FamiliaF" data-toggle="modal" data-target="#FamiliaF">
    @foreach($fotos as $foto)
    <div class="secundaria col-md-6">
        @if($foto->tipo == 'PISO_ORIGINAL')
        <img src="{{asset('imagenes/evidencias/').$foto->nombreArchivo}}" class="img-fluid  hidden-md-down" alt=""> @endif
    </div>
    <div class="secundaria col-md-6">
        @if($foto->tipo == 'PISO_EN_PROCESO')
        <img src="{{asset('imagenes/evidencias/').$foto->nombreArchivo}}" class="img-fluid  hidden-md-down" alt=""> @endif
    </div>
    <div class="principal " title='Agrega aquí el pie de foto'>
        @if($foto->tipo == 'PISO_TERMINADO')
        <img src="{{asset('imagenes/evidencias/').$foto->nombreArchivo}}" class="img-fluid " alt=""> @endif
    </div>
    @endforeach
</button>
@endforeach
