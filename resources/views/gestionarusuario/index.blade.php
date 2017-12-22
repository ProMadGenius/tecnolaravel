@extends('layouts.app')


@section('content')
    <div class="card card-plain">
        <div class="card-header" data-background-color="red">
            <h4 class="title">Cantidad de Visitas a Gestion de Usuarios: {{ Counter::showAndCount('Usuarios') }}</h4>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card card-plain">
        <div class="card-header" data-background-color="blue">
            <h4 class="title">Gestionar Usuarios</h4>
            <p class="category">Usuarios de Madurez</p>
        </div>
    </div>

    <div class="col-md-6">

        @if(\App\DetalleTipoUsuarioCDU::where('idtipousuario','=',Auth::user()->idtipousuario)
                                ->where('idcdu','1')->first()->buscar==1)
        <form action="/admin/gestionarusuario", method="GET">
        <div class="input-group custom-search-form">
            <input type="text" class="form-control" name="nombre" placeholder="Buscar por Nombre...">
            <input type="text" class="form-control" name="email" placeholder="Buscar por Email...">
            <input type="text" class="form-control" name="ci" placeholder="Buscar por Ci...">



            <span class="input-group-btn">
                <button class="btn btn-default-sm" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
        </form>
            @endif


    </div>




    @if(\App\DetalleTipoUsuarioCDU::where('idtipousuario','=',Auth::user()->idtipousuario)
                        ->where('idcdu','1')->first()->insertar==1)
    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('gestionarusuario.create') }}"> Crear</a>
    </div>
    @endif

    <table class="table table-hover">
        <tr>
            <th>No</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>email</th>
            <th>ci</th>
            <th>TipoUsuario</th>
            <th>Facultad</th>
            <th width="280px">Accion</th>
        </tr>
        <tbody>
        @foreach ($usuarios as $key => $usuario)
            <tr>
                <td class="table-text">
                    {{$usuario->id}}
                </td>
                <td class="table-text">
                    {{$usuario->name}}
                </td>
                <td class="table-text">
                    {{$usuario->apellido}}
                </td>
                <td class="table-text">
                    {{$usuario->email}}
                </td>
                <td class="table-text">
                    {{$usuario->ci}}
                </td>
                <td class="table-text">
                    {{\App\TipoUsuario::findOrFail($usuario->idtipousuario)->descripcion}}
                    {{--{{$usuario->idtipousuario}}--}}
                </td>
                <td class="table-text">
                    {{\App\Facultad::findOrFail($usuario->idfacultad)->descripcion}}
                </td>
                <td>
                    <form action="{{ route('gestionarusuario.destroy',$usuario->id) }}" method="POST"
                          class="form-horizontal">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        @if(\App\DetalleTipoUsuarioCDU::where('idtipousuario','=',Auth::user()->idtipousuario)
                        ->where('idcdu','1')->first()->editar==1)
                        <a href="{{ route('gestionarusuario.edit', $usuario->id) }}" class="btn btn-info btn-round">Editar</a>
                        @endif

                        @if(\App\DetalleTipoUsuarioCDU::where('idtipousuario','=',Auth::user()->idtipousuario)
                        ->where('idcdu','1')->first()->eliminar==1)
                        <input type="submit" class="btn btn-danger btn-round" value="Eliminar"/>
                            @endif
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $usuarios->render() !!}

@endsection