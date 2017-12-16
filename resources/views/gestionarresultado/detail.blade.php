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
            <th>Metrica</th>
            <th>Respuesta</th>
        </tr>
        <tbody>
        @foreach ($detalles as $key => $detalle)
            <tr>
                <td class="table-text">
                    {{$detalle->id}}
                </td>
                <td class="table-text">
                    {{\App\Indicador::findOrFail($detalle->idindicador)->metrica}}
                </td>
                <td class="table-text">
                    {{$detalle->respuesta}}
                </td>
                
                <td>
                    {{ csrf_field() }}
                   {{-- <form action="{{ route('gestionardetalle.destroy',$detalle->id) }}" method="POST"
                          class="form-horizontal">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-danger btn-round" value="Eliminar"/>
                    </form>--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{--{!! $detalles->render() !!}--}}

@endsection