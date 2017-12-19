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
                    Crear un nuevo Indicador <a href="{{ route('gestionarindicador.index') }}" class="btn btn-primary btn-round pull-right">Atras</a>
                </div>
                <div class="panel-body">
                    <form action="{{ route('gestionarindicador.store') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Descripcion</label>
                            <div class="col-sm-10">
                                <input type="text" name="descripcion" id="descripcion" class="form-control">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-sm-2" >Metrica</label>
                            <div class="col-sm-10">
                                <input type="text" name="metrica" id="metrica" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" >Id Modelo</label>
                            <div class="col-sm-10">
                                <input type="text" name="idmodelo" id="idmodelo" class="form-control">
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