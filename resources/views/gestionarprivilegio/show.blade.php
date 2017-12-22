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


    <form class="form-horizontal" method="POST" action="{{ route('gestionarprivilegio.update') }}">
        {{ csrf_field() }}
    <table class="table table-hover">
        <tr>
            <th>No</th>
            <th>Caso de Uso</th>
            <th>Uso</th>
            <th>Buscar</th>
            <th>Insertar</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>

        <input type="hidden" name="idtipousuario"  value="{{$idtipousuario}}">

        <tbody>
        @foreach ($detalle_tipousuario_cdus as $key => $detalle_tipousuario_cdu)
            <tr>
                <td class="table-text">
                    {{$detalle_tipousuario_cdu->id}}
                </td>
                <td class="table-text">
                    {{\App\CasoDeUso::findOrFail($detalle_tipousuario_cdu->idcdu)->descripcion}}
                </td>
                <td class="table-text">
                    <div class="togglebutton">
                        <label>
                            <input type="hidden" name="{{$detalle_tipousuario_cdu->idcdu}}[habilitado]"  value="0">
                            <input type="checkbox" name="{{$detalle_tipousuario_cdu->idcdu}}[habilitado]" @if($detalle_tipousuario_cdu->habilitado==1) checked @endif value="1">

                        </label>
                    </div>
                </td>
                <td class="table-text">
                    <div class="togglebutton">
                        <label>
                            <input type="hidden" name="{{$detalle_tipousuario_cdu->idcdu}}[buscar]"  value="0">
                            <input type="checkbox" name="{{$detalle_tipousuario_cdu->idcdu}}[buscar]" @if($detalle_tipousuario_cdu->buscar==1) checked @endif value="1">

                        </label>
                    </div>
                </td>
                <td class="table-text">
                    <div class="togglebutton">
                        <label>
                            <input type="hidden" name="{{$detalle_tipousuario_cdu->idcdu}}[insertar]"  value="0">
                            <input type="checkbox" name="{{$detalle_tipousuario_cdu->idcdu}}[insertar]" @if($detalle_tipousuario_cdu->insertar==1) checked @endif value="1">

                        </label>
                    </div>
                </td>
                <td class="table-text">
                    <div class="togglebutton">
                        <label>
                            <input type="hidden" name="{{$detalle_tipousuario_cdu->idcdu}}[modificar]"  value="0">
                            <input type="checkbox" name="{{$detalle_tipousuario_cdu->idcdu}}[modificar]" @if($detalle_tipousuario_cdu->modificar==1) checked @endif value="1">

                        </label>
                    </div>
                </td>
                <td class="table-text">
                    <div class="togglebutton">
                        <label>
                            <input type="hidden" name="{{$detalle_tipousuario_cdu->idcdu}}[eliminar]"  value="0">
                            <input type="checkbox" name="{{$detalle_tipousuario_cdu->idcdu}}[eliminar]" @if($detalle_tipousuario_cdu->eliminar==1) checked @endif value="1">

                        </label>
                    </div>
                </td>
                <td class="table-text">

                </td>
                <td>
                   {{-- <form action="{{ route('gestionardetalle_tipousuario_cdu.destroy',$detalle_tipousuario_cdu->id) }}" method="POST"
                          class="form-horizontal">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-danger btn-round" value="Eliminar"/>
                    </form>--}}
                    {{--<a href="{{ url('/admin/gestionardetalle_tipousuario_cdu/'.$idencuesta.'/'.$detalle_tipousuario_cdu->id)}}" class="btn btn-info btn-round">Ver Respuestas</a>--}}
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
        
        {{--<input type="checkbox" name="gestionar usuario[activo]" value="1" />activo
        <input type="checkbox" name="gestionar usuario[insertar]" value="1" />insertar
        <input type="checkbox" name="gestionar usuario[eliminar]" value="0" />eliminar

        COLORS:
        <input type="checkbox" name="options[colors][]" value="red" />red
        <input type="checkbox" name="options[colors][]" value="blue" />blue
        <input type="checkbox" name="options[colors][]" value="green" />green
        <input type="checkbox" name="options[colors][]" value="orange" />orange

        TYPES
        <input type="checkbox" name="options[types][]" value="floppy" />floppy
        <input type="checkbox" name="options[types][]" value="compact" />compact
        <input type="checkbox" name="options[types][]" value="hard" />hard
        <input type="checkbox" name="options[types][]" value="digital" />digital
        <input type="checkbox" name="options[types][]" value="analog" />analog
--}}
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Guardar
            </button>
        </div>
    </div>
    </form>

    {{--{!! $detalle_tipousuario_cdus->render() !!}--}}

@endsection