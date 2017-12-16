@extends('layouts.app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card card-plain">
        <div class="card-header" data-background-color="blue">
            <h4 class="title">Gestionar Mi miencuesta</h4>
            <p class="category">Modelos de Madurez</p>
        </div>
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
        @foreach ($miencuestas as $key => $miencuesta)
            <tr>
                <td class="table-text">
                    {{$miencuesta->id}}
                </td>
                <td class="table-text">
                    {{\App\Facultad::findOrFail(\App\Encuesta::findOrFail($miencuesta->idencuesta)->idfacultad)->descripcion}}
                <td>
                    <a href="{{ url('/admin/gestionarresultado/'.$miencuesta->id)}}" class="btn btn-info btn-round">Ver Usuarios</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $miencuestas->render() !!}

@endsection