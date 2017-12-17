<?php

namespace App\Http\Controllers;

use App\DetalleEncuestaUsuario;
use App\Encuesta;
use Illuminate\Http\Request;
use DB;
class ResultadoController extends Controller
{
    public function index()
    {
        $search = (\Request::get('idfacultad'));
        if ($search != NULL){
            $encuestas = Encuesta::where([['idfacultad','=',$search],])
                ->orderBy('idfacultad')
                ->paginate(20);
            return view('gestionarencuesta.index',compact('encuestas'));
        }

        $encuestas = \App\Encuesta::orderBy('id','ASC')->paginate(10);
        return view('gestionarresultado.index',compact('encuestas'));


    }
    public function show($idencuesta)
    {
        $resultados = DB::select('select * from users where id in (select idusuario from detalle_encuesta_usuarios where idencuesta='.$idencuesta.' group by idusuario)');

        return view('gestionarresultado.show',compact('resultados','idencuesta'));
    }
    public function detalle($idencuesta,$idusuario)
    {
        $detalles = \App\DetalleEncuestaUsuario::where('idencuesta',$idencuesta)
            ->where('idusuario',$idusuario)
            ->get();
        return view('gestionarresultado.detail',compact('detalles'));
    }

}
