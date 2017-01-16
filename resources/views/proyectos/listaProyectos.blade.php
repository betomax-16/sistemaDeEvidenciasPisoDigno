@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{asset('css/general.css')}}">
<link rel="stylesheet" href="{{asset('css/proyectos/proyectos.css')}}">
@endsection
@section('content')
<div class="container espacioPagina marco">
    <div class="row">
      <div class="col-md-3"></div>
        <div class="col-md-6">
          <h1 class="text-xs-center">
            Proyectos en <span>
              @if(strtolower($programa) == 'educacion')
                educación
              @elseif(strtolower($programa) == 'medio_ambiente')
                medio ambiente
              @else
                {{$programa}}
              @endif
              </span>
          </h1>
          @if(count($proyectos) == 0 and !Auth::guest() and Auth::user()->role == 'ROLE_PROVIDER')
            <h1 class="display-4 text-md-center" style="color:#B8B7B7;">No participa en ningún proyecto.</h1>
          @elseif(count($proyectos) == 0)
            <h1 class="display-4 text-md-center" style="color:#B8B7B7;">Sin proyectos activos</h1>

          @endif
          @if(count($proyectos) > 0)
            <ul class="listaProyectos">
              @foreach($proyectos as $proyecto)
              <li id="{{$proyecto->nombre}}">
                <span><b>{{$proyecto->nombre}}</b></span>
                <div class="btn-group btn-group-sm hidden-md-down">
                  @if(!Auth::guest() and Auth::user()->role == 'ROLE_ADMIN')
                    <a class="btn purple-inverse btn-secundary" href="{{route('participante.index', [$proyecto->nombre, $estado->idEstado])}}">Participantes</a>
                    <a class="btn blue-inverse btn-secundary" href="{{route('proyecto.edit', [$proyecto->nombre])}}">Editar</a>
                    <button type="button" name="button" class="btn red-inverse btn-secundary btn-delete">Eliminar</button>
                  @endif
                </div>
                <div class="btn-group-vertical btn-group-sm hidden-lg-up">
                  @if(!Auth::guest() and Auth::user()->role == 'ROLE_ADMIN')
                    <a class="btn purple-inverse btn-secundary" href="{{route('participante.index', [$proyecto->nombre, $estado->idEstado])}}">Participantes</a>
                    <a class="btn blue-inverse btn-secundary" href="{{route('proyecto.edit', [$proyecto->nombre])}}">Editar</a>
                    <button type="button" name="button" class="btn red-inverse btn-secundary btn-delete">Eliminar</button>
                  @endif
                </div>
                <a class="btn green circle" href="{{route('evidencia.evidencias', [$proyecto->nombre, $estado->idEstado])}}">&nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>&nbsp;</a>
              </li>
              @endforeach
            </ul>
          @endif
          @if(!Auth::guest() and Auth::user()->role == 'ROLE_ADMIN')
            <a class="btn green-inverse circle" href="{{route('proyecto.create')}}" style="width:100%"><i class="fa fa-plus" aria-hidden="true"></i></a>
          @endif
        </div>
    </div>
    {!! Form::open(['route' => ['proyecto.destroy', 'ID_PROYECTO'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
    {!! Form::close() !!}
    {!! $proyectos->render() !!}
</div>
 @include('layouts/menu/footer')
@endsection
@section('javascripts')
<script type="text/javascript" src="{{asset('js/Proyectos/deleteProyecto.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $('#programas').addClass('active');
    $('#{{ strtolower($programa) }}').addClass('active');
  });
</script>
@endsection
