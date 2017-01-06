@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{asset('css/general.css')}}">
@endsection
@section('content')
<div class="container espacioPagina">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h1>Proyectos de tipo: {{$programa}}</h1>
                  <h4 style="display:inline"> Entidad: {{$estado->nombre}}</h4>
                </div>
                <div class="card-block">
                  @if(!Auth::guest() and Auth::user()->role == 'ROLE_ADMIN')
                    <a class="btn green-inverse btn-lg" href="{{route('proyecto.create')}}" style="width:100%">Nuevo Proyecto</a>
                  @endif
                  @if(count($proyectos) == 0 and !Auth::guest() and Auth::user()->role == 'ROLE_PROVIDER')
                    <h1 class="display-4 text-md-center">No participa en ningún proyecto.</h1>
                  @elseif(count($proyectos) == 0)
                    <h1 class="display-4 text-md-center">Sin proyectos activos</h1>
                  @endif
                  @if(count($proyectos) > 0)
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr class="thead-inverse">
                          <th class="text-md-center">Proyecto</th>
                          <th class="text-md-center hidden-xs-down">Fecha de inicio</th>
                          <th class="text-md-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($proyectos as $proyecto)
                          <tr id="{{$proyecto->nombre}}">
                            <td class="text-md-center"><b>{{$proyecto->nombre}}</b></td>
                            <td class="text-md-center hidden-xs-down">{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$proyecto->created_at)->format('Y-m-d')}}</td>
                            <td class="text-md-center hidden-xs-down">
                              <div class="btn-group">
                                <a class="btn green-inverse btn-secundary" href="{{route('evidencia.evidencias', [$proyecto->nombre, $estado->idEstado])}}">Ver evidencias</a>
                                @if(!Auth::guest() and Auth::user()->role == 'ROLE_ADMIN')
                                  <a class="btn blue-inverse btn-secundary" href="{{route('proyecto.edit', [$proyecto->nombre])}}">Editar</a>
                                  <button type="button" name="button" class="btn red-inverse btn-secundary btn-delete">Eliminar</button>
                                  <a class="btn purple-inverse btn-secundary" href="{{route('participante.index', [$proyecto->nombre, $estado->idEstado])}}">Participantes</a>
                                @endif
                              </div>
                            </td>
                            <td class="text-md-center hidden-sm-up">
                              <div class="btn-group-vertical btn-group-sm">
                                <a class="btn green-inverse btn-secundary btn-xs" href="{{route('evidencia.evidencias', [$proyecto->nombre, $estado->idEstado])}}">Ver evidencias</a>
                                @if(!Auth::guest() and Auth::user()->role == 'ROLE_ADMIN')
                                  <a class="btn blue-inverse btn-secundary" href="{{route('proyecto.edit', [$proyecto->nombre])}}">Editar</a>
                                  <button type="button" name="button" class="btn red-inverse btn-secundary btn-delete">Eliminar</button>
                                  <a class="btn purple-inverse btn-secundary" href="{{route('participante.index', [$proyecto->nombre, $estado->idEstado])}}">Participantes</a>
                                @endif
                              </div>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  @endif
                  {!! Form::open(['route' => ['proyecto.destroy', 'ID_PROYECTO'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
                  {!! Form::close() !!}
                  {!! $proyectos->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascripts')
<script type="text/javascript" src="{{asset('js/Proyectos/deleteProyecto.js')}}"></script>
@endsection
