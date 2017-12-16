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
                    Crear un nueva encuesta <a href="{{ route('gestionarencuesta.index') }}" class="btn btn-primary btn-round pull-right">Atras</a>
                </div>
                <div class="panel-body">
                    <form action="{{ route('gestionarencuesta.store') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <?php $facultads = \App\Facultad::all() ?>

                        <div class="form-group">
                            <label for="sel1" class="col-md-4 control-label ">Facultad</label>
                            <select name="idfacultad" class="col-md-4 control-label" id="sel1">
                                @foreach($facultads as $facultad)
                                    <option value="{{$facultad->id}}">{{$facultad->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sel1" class="col-md-4 control-label ">Fecha Inicio</label>
                            <input type="text" name="fechainicio" class="datepicker"  value="03/12/2017">
                        </div>
                        <div class="form-group">
                            <label for="sel1"  class="col-md-4 control-label ">Fecha Fin</label>
                            <input type="text" name="fechafin" class="datepicker"  value="03/12/2017">
                        </div>

                        {{----}}

                        {{--<script>
                            $(document).ready(function() {
                                $('.datepicker').datepicker();
                            });
                        </script>--}}
                        {{----}}


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
