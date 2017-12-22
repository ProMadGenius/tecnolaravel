@extends('layouts.app')
@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card card-plain">
        <div class="card-header" data-background-color="blue">
            <h4 class="title">Gestionar tipousuarios</h4>
            <p class="category">tipousuarios de Madurez</p>
        </div>
    </div>
    
    
    <table class="table table-hover">
        <tr>
            <th>No</th>
            <th>Descripcion</th>
            <th width="280px">Accion</th>
        </tr>
        <tbody>
        @foreach ($tipousuarios as $key => $tipousuario)
            <tr>
                <td class="table-text">
                    {{$tipousuario->id}}
                </td>

                <td class="table-text">
                    {{$tipousuario->descripcion}}
                </td>
                <td>
                    <a href="{{ url('/admin/gestionarprivilegio/'. $tipousuario->id)}}" class="btn btn-info btn-round">Gestionar Privilegios</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $tipousuarios->render() !!}

@endsection