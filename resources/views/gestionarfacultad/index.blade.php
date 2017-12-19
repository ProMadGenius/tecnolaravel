@extends('layouts.app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card card-plain">
        <div class="card-header" data-background-color="blue">
            <h4 class="title">Gestionar Facultads</h4>
            <p class="category">Facultads de Madurez</p>
        </div>
    </div>
    @if(\App\DetalleTipoUsuarioCDU::where('idtipousuario','=',Auth::user()->idtipousuario)
                     ->where('idcdu','4')->first()->insertar==1)
    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('gestionarfacultad.create') }}"> Crear</a>

    </div>@endif

    @if(\App\DetalleTipoUsuarioCDU::where('idtipousuario','=',Auth::user()->idtipousuario)
                     ->where('idcdu','4')->first()->buscar==1)
    <form action="/admin/gestionarfacultad" method="GET">
        <div class="input-group custom-search-form">
            <input type="text" class="form-control" name="descripcion" placeholder="Buscar por Facultad...">
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
            <th>Descripcion</th>
            <th width="280px">Accion</th>
        </tr>
        <tbody>
        @foreach ($facultads as $key => $facultad)
            <tr>
                <td class="table-text">
                    {{$facultad->id}}
                </td>
                <td class="table-text">
                    {{$facultad->descripcion}}
                </td>
                <td>
                    <form action="{{ route('gestionarfacultad.destroy',$facultad->id) }}" method="POST"
                          class="form-horizontal">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        @if(\App\DetalleTipoUsuarioCDU::where('idtipousuario','=',Auth::user()->idtipousuario)
                     ->where('idcdu','4')->first()->editar==1)
                        <a href="{{ route('gestionarfacultad.edit', $facultad->id) }}" class="btn btn-info btn-round">Editar</a>@endif
                            @if(\App\DetalleTipoUsuarioCDU::where('idtipousuario','=',Auth::user()->idtipousuario)
                         ->where('idcdu','4')->first()->eliminar==1)
                        <input type="submit" class="btn btn-danger btn-round" value="Eliminar"/>@endif
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $facultads->render() !!}

@endsection