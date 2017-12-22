<?php

namespace App\Http\Controllers;

use App\DetalleEncuestaUsuario;
use App\Encuesta;
use App\NivelMadurez;
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

    public function niveles($idencuesta)
    {
        $niveles = DB::table('nivel_madurezs')->where('encuesta_id', $idencuesta)->orderBy('nivel_id')->get();
        //dd($niveles);
        return view('gestionarresultado.niveles')->with('niveles', $niveles);

    }


    public function detalle($idencuesta,$idusuario)
    {
        $detalles = \App\DetalleEncuestaUsuario::where('idencuesta',$idencuesta)
            ->where('idusuario',$idusuario)
            ->get();
        return view('gestionarresultado.detail',compact('detalles'));
    }
    public function showgrafico($idencuesta)
    {
        $users = DB::table('detalle_encuesta_usuarios')
            ->select(DB::raw('count(*) as user_count,detalle_encuesta_usuarios.idindicador','detalle_encuesta_usuarios.respuesta'),'indicadors.descripcion')
            -> join ('indicadors' , 'indicadors.id' ,'=','detalle_encuesta_usuarios.idindicador')
            -> join ('encuestas' , 'encuestas.id' ,'=','detalle_encuesta_usuarios.idencuesta')
            //->where('indicadors.idmodelo','=',6)
            ->where('detalle_encuesta_usuarios.idencuesta','=',$idencuesta)
            ->where('detalle_encuesta_usuarios.respuesta','=','si')
            ->groupBy('detalle_encuesta_usuarios.idindicador','detalle_encuesta_usuarios.respuesta','indicadors.descripcion')
            ->orderBy('detalle_encuesta_usuarios.idindicador')
            ->get();

        //   return view('chart13',['users'=>$users]);

        return view('gestionargrafico.chart3',compact('users','idencuesta'));
    }
    public function showgraficoN($idencuesta)
    {
        $users = DB::table('detalle_encuesta_usuarios')
            ->select(DB::raw('count(*) as user_count,detalle_encuesta_usuarios.idindicador','detalle_encuesta_usuarios.respuesta'),'indicadors.descripcion')
            -> join ('indicadors' , 'indicadors.id' ,'=','detalle_encuesta_usuarios.idindicador')
            -> join ('encuestas' , 'encuestas.id' ,'=','detalle_encuesta_usuarios.idencuesta')
            //->where('indicadors.idmodelo','=',6)
            ->where('detalle_encuesta_usuarios.idencuesta','=',$idencuesta)
            ->where('detalle_encuesta_usuarios.respuesta','=','no')
            ->groupBy('detalle_encuesta_usuarios.idindicador','detalle_encuesta_usuarios.respuesta','indicadors.descripcion')
            ->orderBy('detalle_encuesta_usuarios.idindicador')
            ->get();

        //   return view('chart13',['users'=>$users]);

        return view('gestionargrafico.chart4',compact('users','idencuesta'));
    }


    public function detallegrafico($idencuesta,$idusuario)
    {

        $users = DB::table('detalle_encuesta_usuarios')
            ->select(DB::raw('count(*) as user_count,detalle_encuesta_usuarios.idindicador','detalle_encuesta_usuarios.respuesta'),'indicadors.descripcion')
            -> join ('indicadors' , 'indicadors.id' ,'=','detalle_encuesta_usuarios.idindicador')
            -> join ('encuestas' , 'encuestas.id' ,'=','detalle_encuesta_usuarios.idencuesta')
            //->where('indicadors.idmodelo','=',6)
            ->where('detalle_encuesta_usuarios.idencuesta','=',$idencuesta)
            ->where('detalle_encuesta_usuarios.idusuario','=',$idusuario)
            ->where('detalle_encuesta_usuarios.respuesta','=','si')
            // ->where('indicadors.idmodelo','=',1)
            ->groupBy('detalle_encuesta_usuarios.idindicador','detalle_encuesta_usuarios.respuesta','indicadors.descripcion')
            ->orderBy('detalle_encuesta_usuarios.idindicador')
            ->get();

        $consulta = DB::table('detalle_encuesta_usuarios')
            ->select(DB::raw('count(*) as user_count,detalle_encuesta_usuarios.idindicador','detalle_encuesta_usuarios.respuesta'),'indicadors.descripcion')
            -> join ('indicadors' , 'indicadors.id' ,'=','detalle_encuesta_usuarios.idindicador')
            -> join ('encuestas' , 'encuestas.id' ,'=','detalle_encuesta_usuarios.idencuesta')
            //->where('indicadors.idmodelo','=',6)
            ->where('detalle_encuesta_usuarios.idencuesta','=',$idencuesta)
            ->where('detalle_encuesta_usuarios.idusuario','=',$idusuario)
            ->where('detalle_encuesta_usuarios.respuesta','=','no')
            // ->where('indicadors.idmodelo','=',1)
            ->groupBy('detalle_encuesta_usuarios.idindicador','detalle_encuesta_usuarios.respuesta','indicadors.descripcion')
            ->orderBy('detalle_encuesta_usuarios.idindicador')
            ->get();


        return view('gestionargrafico.chart5')->with('users', $users)->with('consulta', $consulta);





        return view('gestionargrafico.chart5',compact('users'));
    }
    public function detallegraficoN($idencuesta,$idusuario)
    {

        $users = DB::table('detalle_encuesta_usuarios')
            ->select(DB::raw('count(*) as user_count,detalle_encuesta_usuarios.idindicador','detalle_encuesta_usuarios.respuesta'),'indicadors.descripcion')
            -> join ('indicadors' , 'indicadors.id' ,'=','detalle_encuesta_usuarios.idindicador')
            -> join ('encuestas' , 'encuestas.id' ,'=','detalle_encuesta_usuarios.idencuesta')
            //->where('indicadors.idmodelo','=',6)
            ->where('detalle_encuesta_usuarios.idencuesta','=',$idencuesta)
            ->where('detalle_encuesta_usuarios.idusuario','=',$idusuario)
            ->where('detalle_encuesta_usuarios.respuesta','=','no')
            // ->where('indicadors.idmodelo','=',1)
            ->groupBy('detalle_encuesta_usuarios.idindicador','detalle_encuesta_usuarios.respuesta','indicadors.descripcion')
            ->orderBy('detalle_encuesta_usuarios.idindicador')
            ->get();


        return view('gestionargrafico.chart6',compact('users'));
    }
}
