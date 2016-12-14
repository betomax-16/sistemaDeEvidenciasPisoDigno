<div class="col-md-4" id="evidencia%ID%">\
    <div class="panel panel-primary">\
        <div class="panel-heading">\
          Familia: <b><span>%FAMILIA%</span></b>\
          @if(!Auth::guest())
            <button type="button" name="button" class="btn btn-danger" id="%ID%">X</button>\
          @endif
        </div>\
        <div class="panel-body">\
          @if(!Auth::guest())
            <a href="{{route('evidencia.edit', '%ID%')}}">\
          @else
            <a href="{{route('evidencia.ver', '%ID%')}}">\
          @endif
            <div class="row">\
                <div class="col-md-6">\
                    <center><img src="{{asset('imagenes/evidencias')}}%URL1%" class="img-thumbnail img-responsive box"></img></center>\
                </div>\
                <div class="col-md-6">\
                    <center><img src="{{asset('imagenes/evidencias')}}%URL2%" class="img-thumbnail img-responsive box"></img></center>\
                </div>\
            </div></br>\
            <div class="row">\
                <div class="col-md-12">\
                    <center><img src="{{asset('imagenes/evidencias')}}%URL3%" class="img-thumbnail img-responsive bigbox"></img></center>\
                </div>\
            </div>\
          </a>\
        </div>\
    </div>\
</div>\
