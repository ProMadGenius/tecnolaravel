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

    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>Encuesta ID</th>
            <th>Nivel ID</th>
            <th>Cuantificacion</th>
            <th>Nivel de Madurez Aprobado</th>

        </tr>
        <tbody>
        @foreach ($niveles as $resultado)
            <tr>
                <td class="table-text">
                    {{$resultado->id}}
                </td>
                <td class="table-text">
                    {{$resultado->encuesta_id}}
                </td>
                <td class="table-text">

                    Nivel {{\App\Modelo::findOrFail($resultado->nivel_id)->descripcion}}
                </td>
                <td class="table-text">
                    {{$resultado->cuantificacion}} %
                </td>

                <td class="table-text">
                    {{$resultado->nivel_madurez_aprobado}}
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

    {{--{!! $resultados->render() !!}--}}

@endsection