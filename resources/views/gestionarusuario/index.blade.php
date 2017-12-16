@extends('layouts.app')


@section('content')

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
    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('gestionarusuario.create') }}"> Crear</a>

    </div>

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
                        <a href="{{ route('gestionarusuario.edit', $usuario->id) }}" class="btn btn-info btn-round">Editar</a>
                        <input type="submit" class="btn btn-danger btn-round" value="Eliminar"/>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $usuarios->render() !!}

@endsection