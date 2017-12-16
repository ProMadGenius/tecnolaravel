@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach()
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editar Modelo <a href="{{ route('gestionarmodelo.index') }}" class="btn btn-primary btn-round pull-right">Atras</a>
                </div>
                <div class="panel-body">
                    <form action="{{ route('gestionarmodelo.update',$modelo->id) }}" method="POST" class="form-horizontal">
                   {{-- <form action="{{ url('/admin/gestionarmodelo/'.$modelo->id) }}" method="PUT" class="form-horizontal">--}}
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Descripcion</label>
                            <div class="col-sm-10">
                                <input type="text" name="descripcion" id="descripcion" value="{{$modelo->descripcion}}" class="form-control">
                                <input type="hidden" name="id" id="id" value="{{$modelo->id}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" class="btn btn-primary" value="Guardar" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection