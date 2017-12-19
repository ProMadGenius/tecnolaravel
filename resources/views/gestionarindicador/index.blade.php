@extends('layouts.app')


@section('content')
    <div class="card card-plain">
        <div class="card-header" data-background-color="red">
            <h4 class="title">Cantidad de Visitas a Gestion de Indicadores: {{ Counter::showAndCount('Indicadores') }}</h4>

        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card card-plain">
        <div class="card-header" data-background-color="blue">
            <h4 class="title">Gestionar Indicadores</h4>

        </div>
    </div>
    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('gestionarindicador.create') }}"> Crear</a>

    </div>

    <form action="/admin/gestionarindicador" method="GET">
        <div class="input-group custom-search-form">
            <input type="text" class="form-control" name="descripcion" placeholder="Buscar por Indicador...">




            <span class="input-group-btn">
                <button class="btn btn-default-sm" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </form>

    <table class="table table-hover">
        <tr>
            <th>No</th>
            <th>Descripcion</th>
            <th>Métrica</th>
            <th width="280px">Accion</th>
        </tr>
        <tbody>
        @foreach ($indicadores as $key => $indicador)
            <tr>
                <td class="table-text">
                    {{$indicador->id}}
                </td>
                <td class="table-text">
                    {{$indicador->descripcion}}
                </td>

                <td class="table-text">
                    {{$indicador->metrica}}
                </td>
                <td>
                    <form action="{{ route('gestionarindicador.destroy',$indicador->id) }}" method="POST"
                          class="form-horizontal">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <a href="{{ route('gestionarindicador.edit', $indicador->id) }}" class="btn btn-info btn-round">Editar</a>
                        <input type="submit" class="btn btn-danger btn-round" value="Eliminar"/>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $indicadores->render() !!}

@endsection