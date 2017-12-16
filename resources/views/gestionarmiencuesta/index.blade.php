@extends('layouts.app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif



    <div class="card card-plain">
        <div class="card-header" data-background-color="blue">
            <h4 class="title">Gestionar Mi miencuesta</h4>
            <p class="category">Modelos de Madurez</p>
        </div>
    </div>



    <form action="{{ route('gestionarmiencuesta.store') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
                <table class="table table-hover">
                    <tr>
                        <th>Id Detalle</th>
                        <th>Pregunta</th>
                        <th width="640px">Respuesta</th>
                    </tr>
                    <tbody>
                    @foreach ($miencuestas as $mio)
                        <tr>
                            <td class="table-text">
                                {{$mio->idindicador}}
                            </td>
                            <td class="table-text">
                                {{\App\Indicador::findOrFail($mio->idindicador)->descripcion}}
                            </td>



                            <td class="table-text">
                            <select name="{{$mio->id}}" class="col-md-4 control-label" id="sel1">
                                <option value="{{'ns/nr'}}">No sabe / No responde</option>
                                <option value="{{'si'}}">Si</option>
                                <option value="{{'no'}}">No</option>


                            </select>
                            </td>


                        </tr>

                    @endforeach
                    </tbody>
                </table>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary" value="Enviar Encuesta" />
            </div>
        </div>

    </form>



@endsection