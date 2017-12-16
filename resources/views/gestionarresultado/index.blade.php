@extends('layouts.app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card card-plain">
        <div class="card-header" data-background-color="blue">
            <h4 class="title">Gestionar Encuestas</h4>
            <p class="category">Encuestas de Madurez</p>
        </div>
    </div>
    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('gestionarencuesta.create') }}"> Crear</a>

    </div>

    <table class="table table-hover">
        <tr>
            <th>No</th>
            <th>Facultad</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <th width="280px">Accion</th>
        </tr>
        <tbody>
        @foreach ($encuestas as $key => $encuesta)
            <tr>
                <td class="table-text">
                    {{$encuesta->id}}
                </td>
                <td class="table-text">
                    {{\App\Facultad::findOrFail($encuesta->idfacultad)->descripcion}}
                </td><td class="table-text">
                    {{$encuesta->fechainicio}}
                </td><td class="table-text">
                    {{$encuesta->fechafin}}
                </td>
                <td>
                    <a href="{{ url('/admin/gestionarresultado/'.$encuesta->id)}}" class="btn btn-info btn-round">Ver Usuarios</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $encuestas->render() !!}

@endsection