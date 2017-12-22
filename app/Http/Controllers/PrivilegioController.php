<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PrivilegioController extends Controller
{
    //

    public function index()
    {
        $tipousuarios = \App\TipoUsuario::orderBy('id','ASC')->paginate(10);
        return view('gestionarprivilegio.index',compact('tipousuarios'));


    }
    public function show($idtipousuario)
    {
       // return "hello";
        //$resultados = DB::select('select * from users where id in (select idusuario from detalle_encuesta_usuarios where idencuesta='.$idencuesta.' group by idusuario)');
        $detalle_tipousuario_cdus= DB::select('select * from detalle_tipousuario_cdus where idtipousuario='.$idtipousuario.' order by id ASC');
        //return $detalle_tipousuario_cdus;
        return view('gestionarprivilegio.show',compact('detalle_tipousuario_cdus','idtipousuario'));
    }

    public function update(Request $request)
    {

        for( $i=1;$i<12;$i++){
            $d_tu_cdu= \App\DetalleTipoUsuarioCDU::where('idtipousuario','=',$request->get("idtipousuario"))
                ->where('idcdu',$i)->first();
            $d_tu_cdu->habilitado=$request->get($i)["habilitado"];
            $d_tu_cdu->buscar=$request->get($i)["buscar"];
            $d_tu_cdu->insertar=$request->get($i)["insertar"];
            $d_tu_cdu->modificar=$request->get($i)["modificar"];
            $d_tu_cdu->eliminar=$request->get($i)["eliminar"];
            $d_tu_cdu->update();


        }

        return redirect()->route('gestionarprivilegio.index')
            ->with('success','Privilegios Actualizados Correctamente');
    }


}
