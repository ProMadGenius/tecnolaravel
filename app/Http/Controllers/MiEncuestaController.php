<?php

namespace App\Http\Controllers;

use App\DetalleEncuestaUsuario;
use App\Encuesta;
use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
class MiEncuestaController extends Controller
{
    public function index()
    {
        $userid=Auth::user()->id;
        //$miencuestas = DB::select('select d.idencuesta from detalle_encuesta_usuarios as d where idusuario='.$userid.' group by idencuesta');
        $miencuestas = DB::select('select * from detalle_encuesta_usuarios as d where idusuario='.$userid.'');
        //esto devuelve la id de la encuesta nada mas



        //return $miencuestas;
        $array = array();
        foreach($miencuestas as $miencuesta){
            $array[]=$miencuesta->idencuesta;
        }
        $facultads=DB::table('encuestas')
            ->whereIn('id',$array)
            ->orderBy('id')
            ->get();
        //return $miencuestas;
        return view('gestionarmiencuesta.index',compact('miencuestas'));
    }


    public function store(Request $request)
    {
        $userid=Auth::user()->id;

        $uno = DB::table('detalle_encuesta_usuarios')->where('idusuario', $userid)->orderBy('id')->first();

        $otro = $uno->id;

        for($i =$otro;$i<= $otro + 29;$i++)
        {
            $detalle = DetalleEncuestaUsuario::find($i);
            $detalle->respuesta = $request->$i;
            $detalle->save();
        }



        Session::flash('success', 'Encuesta guardada exitosamente');
        return redirect()->route('gestionarmiencuesta.index');
    }
}
