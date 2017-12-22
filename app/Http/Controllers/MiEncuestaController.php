<?php

namespace App\Http\Controllers;

use App\DetalleEncuestaUsuario;
use App\Encuesta;
use App\NivelMadurez;
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
        $miencuestas = DB::select('select * from detalle_encuesta_usuarios as d where idusuario='.$userid.' order by d.id');
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

        //aqui quiero que se vuelva a calcular en la tabla de "nivelmadurez"

        //$consultita2 = DB::table('detalle_encuesta_usuarios')->where('idencuesta', 1)->get()->count();






        for($i =1;$i<= 6;$i++)
        {




            //buscar el indice de mi encuesta
            $indice = DB::table('nivel_madurezs')
                ->where('encuesta_id', $uno->idencuesta)
                ->where('nivel_id', $i)
                ->get();


            //preguntar si no existe
            if ($indice->isEmpty()){
                //si es la primera vez
                $nivelmadurez = new NivelMadurez();

                $deboGuardar = true;
                //dd($uno->idencuesta);

            }else{
                //dd($indice->get(0)->id);
                $nivelmadurez = NivelMadurez::findOrFail($indice->get(0)->id);
                $deboGuardar = false;

            }

            $nivelmadurez->encuesta_id = $uno->idencuesta;
            $nivelmadurez->nivel_id = $i;
            //falta ver cuantificacion :'''v
            $multiplicador = $i *5;
            $consultita = 1;
            $consultita = DB::table('detalle_encuesta_usuarios')
                ->where('idencuesta', $uno->idencuesta)
                ->where('respuesta', 'si')
                ->where('idindicador','<=',$i *5)
                ->where('idindicador','>',($i-1) *5)
                ->get()->count();

            //dd($consultita);

            $nivelmadurez->cuantificacion = ($consultita * 10) / 5;

            if ($nivelmadurez->cuantificacion >= 90){
                $nivelmadurez->nivel_madurez_aprobado = 'PROMOVIDO';
            }else{
                if ($nivelmadurez->cuantificacion >=60){
                    $nivelmadurez->nivel_madurez_aprobado = 'MEDIO';
                }else{
                    if ($nivelmadurez->cuantificacion >= 30){
                        $nivelmadurez->nivel_madurez_aprobado = 'BASICO';
                    }else{
                        $nivelmadurez->nivel_madurez_aprobado = 'INICIAL';
                    }
                }
            }
            if ($deboGuardar = true){
                $nivelmadurez->save();
            }else{
                $nivelmadurez->update();
            }
        }



        Session::flash('success', 'Encuesta guardada exitosamente');
        return redirect()->route('gestionarmiencuesta.index');
    }
}
