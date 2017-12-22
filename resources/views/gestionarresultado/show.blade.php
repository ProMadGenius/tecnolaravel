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
            <th>No</th>
            <th>Nombre</th>
            <th>TipoUsuario</th>
            <th>Email</th>
            <th width="280px">Accion</th>
        </tr>
        <tbody>
        @foreach ($resultados as $key => $resultado)
            <tr>
                <td class="table-text">
                    {{$resultado->id}}
                </td>
                <td class="table-text">
                    {{$resultado->name}} {{$resultado->apellido}}
                </td>
                <td class="table-text">
                    {{\App\TipoUsuario::findOrFail($resultado->idtipousuario)->descripcion}}
                </td>
                <td class="table-text">
                    {{$resultado->email}}
                </td>
                <td>
                    {{ csrf_field() }}
                   {{-- <form action="{{ route('gestionarresultado.destroy',$resultado->id) }}" method="POST"
                          class="form-horizontal">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-danger btn-round" value="Eliminar"/>
                    </form>--}}
                    <a href="{{ url('/admin/gestionarresultado/'.$idencuesta.'/'.$resultado->id)}}" class="btn btn-info btn-round">Ver Respuestas</a>
                    <a href="{{ url('/admin/gestionargrafico/yes/'.$idencuesta.'/'.$resultado->id)}}" class="btn btn-info btn-round">Ver Cantidad Respuestas Positivas</a>
                    <a href="{{ url('/admin/gestionargrafico/no/'.$idencuesta.'/'.$resultado->id)}}" class="btn btn-info btn-round">Ver Cantidad Respuestas Negativas</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{--{!! $resultados->render() !!}--}}

@endsection