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
    @if(\App\DetalleTipoUsuarioCDU::where('idtipousuario','=',Auth::user()->idtipousuario)
                 ->where('idcdu','6')->first()->insertar==1)
    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('gestionarencuesta.create') }}"> Crear</a>

    </div>@endif


    @if(\App\DetalleTipoUsuarioCDU::where('idtipousuario','=',Auth::user()->idtipousuario)
                 ->where('idcdu','6')->first()->buscar==1)
    <form action="/admin/gestionarencuesta" method="GET">
        <div class="input-group custom-search-form">
            <input type="text" class="form-control" name="idfacultad" placeholder="Buscar por Facultad ID...">
            <span class="input-group-btn">
                <button class="btn btn-default-sm" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </form>@endif

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
                    <form action="{{ route('gestionarencuesta.destroy',$encuesta->id) }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        @if(\App\DetalleTipoUsuarioCDU::where('idtipousuario','=',Auth::user()->idtipousuario)
             ->where('idcdu','6')->first()->editar==1)
                        <a href="{{ route('gestionarencuesta.edit', $encuesta->id) }}" class="btn btn-info btn-round">Editar</a>@endif
                        @if(\App\DetalleTipoUsuarioCDU::where('idtipousuario','=',Auth::user()->idtipousuario)
             ->where('idcdu','6')->first()->eliminar==1)
                        <input type="submit" class="btn btn-danger btn-round" value="Eliminar" />@endif
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $encuestas->render() !!}

@endsection