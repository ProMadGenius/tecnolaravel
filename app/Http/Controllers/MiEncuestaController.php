<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class MiEncuestaController extends Controller
{
    public function index()
    {
        $userid=Auth::user()->id;
        $miencuestas = DB::select('select d.idencuesta from detalle_encuesta_usuarios as d where idusuario='.$userid.' group by idencuesta');

        //return $miencuestas;
        $array = array();
        foreach($miencuestas as $miencuesta){
            $array[]=$miencuesta->idencuesta;
        }
        $facultads=DB::table('encuestas')
            ->whereIn('id',$array)
            ->get();
        return $facultads;
        return view('gestionarmiencuesta.index',compact('facultads'));
    }
}
