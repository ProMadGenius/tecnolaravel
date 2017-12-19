@extends('layouts.app')


@section('content')


   {{-- <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Items CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('gestionarmodelo.create') }}"> Crear Un Nuevo Modelo</a>
            </div>
        </div>
    </div>--}}
   <div class="card card-plain">
       <div class="card-header" data-background-color="purple">
           <h4 class="title">Cantidad de Visitas a Gestion de Modelos: {{ Counter::showAndCount('Modelos') }}</h4>

       </div>
   </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card card-plain">


        <div class="card-header" data-background-color="blue">
            <h4 class="title">Gestionar Modelos</h4>
            <p class="category">Modelos de Madurez</p>
        </div>
    </div>
    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('gestionarmodelo.create') }}"> Crear</a>

       {{-- <button class="btn btn-success btn-round" href="{{ route('gestionarmodelo.create') }}">
            <i class="material-icons" >create</i> Crear
            <div class="ripple-container" ></div></button>--}}

    </div>

   <form action="/admin/gestionarmodelo" method="GET">
       <div class="input-group custom-search-form">
           <input type="text" class="form-control" name="descripcion" placeholder="Buscar por Descripcion...">




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
        @foreach ($modelos as $key => $modelo)
            <tr>
                <td class="table-text">
                    {{$modelo->id}}
                </td>
                <td class="table-text">
                    {{$modelo->descripcion}}
                </td>
                <td>
                    {{--<a href="{{ route('posts.details', $post->id) }}" class="label label-success">Details</a>--}}

                    <form action="{{ route('gestionarmodelo.destroy',$modelo->id) }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <a href="{{ route('gestionarmodelo.edit', $modelo->id) }}" class="btn btn-info btn-round">Editar</a>
                        <input type="submit" class="btn btn-danger btn-round" value="Eliminar" />
                    {{--<a href="{{ route('gestionarmodelo.destroy', $modelo->id) }}" class="btn btn-danger btn-round" onclick="return confirm('Esta seguro que quiere eliminar?')">Eliminar</a>--}}
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $modelos->render() !!}


@endsection