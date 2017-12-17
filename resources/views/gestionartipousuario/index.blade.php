@extends('layouts.app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card card-plain">
        <div class="card-header" data-background-color="blue">
            <h4 class="title">Gestionar Tipo Usuario</h4>
            <p class="category">Modelos de Madurez</p>
        </div>
    </div>
    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('gestionartipousuario.create') }}"> Crear</a>

    </div>

    <form action="/admin/gestionartipousuario" method="GET">
        <div class="input-group custom-search-form">
            <input type="text" class="form-control" name="descripcion" placeholder="Buscar por Tipo de Usuario...">




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
                    <form action="{{ route('gestionartipousuario.destroy',$tipousuario->id) }}" method="POST"
                          class="form-horizontal">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <a href="{{ route('gestionartipousuario.edit', $tipousuario->id) }}" class="btn btn-info btn-round">Editar</a>
                        <input type="submit" class="btn btn-danger btn-round" value="Eliminar"/>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $tipousuarios->render() !!}

@endsection