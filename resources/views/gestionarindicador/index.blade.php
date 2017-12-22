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
    @if(\App\DetalleTipoUsuarioCDU::where('idtipousuario','=',Auth::user()->idtipousuario)
                        ->where('idcdu','1')->first()->insertar==1)
    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('gestionarindicador.create') }}"> Crear</a>

    </div> @endif

    @if(\App\DetalleTipoUsuarioCDU::where('idtipousuario','=',Auth::user()->idtipousuario)
                                ->where('idcdu','2')->first()->buscar==1)
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
    @endif

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

                        @if(\App\DetalleTipoUsuarioCDU::where('idtipousuario','=',Auth::user()->idtipousuario)
                        ->where('idcdu','2')->first()->editar==1)
                        <a href="{{ route('gestionarindicador.edit', $indicador->id) }}" class="btn btn-info btn-round">Editar</a>@endif
                        @if(\App\DetalleTipoUsuarioCDU::where('idtipousuario','=',Auth::user()->idtipousuario)
                        ->where('idcdu','2')->first()->eliminar==1)
                            <input type="submit" class="btn btn-danger btn-round" value="Eliminar"/>@endif
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $indicadores->render() !!}

@endsection