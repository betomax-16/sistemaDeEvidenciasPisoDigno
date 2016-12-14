@extends('layouts.app')

@section('content')
<div class="container espacioPagina">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Proyectos</h1></div>
                <div class="panel-body">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th class="text-center">Proyecto</th>
                          <th class="text-center">Fecha de creacion</th>
                          <th class="text-center">Estado</th>
                          <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($proyectos as $proyecto)
                          <tr>
                            <td class="text-center">{{$proyecto->nombre}}</td>
                            <td class="text-center">{{$proyecto->created_at}}</td>
                            @php($aux = array())
                            @foreach($proyecto->estados as $estado)
                              @php($aux[$estado->idEstado] = $estado->nombre)
                            @endforeach
                            <td class="text-center">{!! Form::select('estado', $aux, null, ['class' => 'form-control']) !!}</td>
                            <td>
                              <a href="{{route('proyecto.show', $proyecto->nombre)}}" class="btn btn-success" style="width:100%">Abrir</a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {!! $proyectos->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
