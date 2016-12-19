@extends('layouts.app')
@section('styles')

@endsection
@section('content')
<div class="container espacioPagina">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h1>Proyectos de tipo: {{$programa}}</h1>
                  <h4 style="display:inline"> Entidad: {{$estado->nombre}}</h4>
                </div>
                <div class="panel-body">
                  @if(!Auth::guest() and Auth::user()->role == 'ROLE_ADMIN')
                    <a class="btn btn-success btn-lg" href="{{route('proyecto.create')}}">Nuevo Proyecto</a>
                  @endif
                  @if(count($proyectos) == 0 and !Auth::guest() and Auth::user()->role == 'ROLE_PROVIDER')
                    <h3>No participa en ningún proyecto.</h3>
                  @elseif(count($proyectos) == 0)
                    <h3>Sin proyectos activos</h3>
                  @endif
                  @if(count($proyectos) > 0)
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th class="text-center">Proyecto</th>
                          <th class="text-center">Fecha de inicio</th>
                          <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($proyectos as $proyecto)
                          <tr id="{{$proyecto->nombre}}">
                            <td class="text-center">{{$proyecto->nombre}}</td>
                            <td class="text-center">{{$proyecto->created_at}}</td>
                            <td class="text-center">
                              <a class="btn btn-success" href="{{route('evidencia.evidencias', [$proyecto->nombre, $estado->idEstado])}}">Ver evidencias</a>
                              @if(!Auth::guest() and Auth::user()->role == 'ROLE_ADMIN')
                                <a class="btn btn-info" href="{{route('proyecto.edit', [$proyecto->nombre])}}">Editar</a>
                                <button type="button" name="button" class="btn btn-danger btn-delete">Eliminar</button>
                                <a class="btn btn-primary" href="{{route('participante.create')}}">Participantes</a>
                              @endif
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  @endif
                  {!! Form::open(['route' => ['proyecto.destroy', 'ID_PROYECTO'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascripts')
<script type="text/javascript" src="{{asset('js/Proyectos/deleteProyecto.js')}}"></script>
@endsection
