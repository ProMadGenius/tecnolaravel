<?php

namespace App\Http\Controllers;

use App\TipoUsuario;
use Illuminate\Http\Request;
use Session;
class TipoUsuarioController extends Controller
{
    public function index()
    {
        //$tipousuarios = \App\TipoUsuario::orderBy('id','ASC')->paginate(10);

        $search = ucfirst(\Request::get('descripcion'));
        $tipousuarios = TipoUsuario::where([['descripcion','like','%'.$search.'%'],])
            ->orderBy('descripcion')
            ->paginate(20);
        return view('gestionartipousuario.index',compact('tipousuarios'));

    }

    public function create()
    {
        return view('gestionartipousuario.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'descripcion' => 'required'
        ]);
        $tipousuario = new TipoUsuario();
        $tipousuario->descripcion=$request->descripcion;
        $tipousuario->save();

        $cdus = \App\CasoDeUso::all();
        $tipousuarios = \App\TipoUsuario::all();
            foreach ($cdus as $cdu){
                $detalle_tipousuario_cdu = new \App\DetalleTipoUsuarioCDU();
                $detalle_tipousuario_cdu->idtipousuario=$tipousuario->id;
                $detalle_tipousuario_cdu->idcdu=$cdu->id;
                $detalle_tipousuario_cdu->habilitado=1;
                $detalle_tipousuario_cdu->buscar=1;
                $detalle_tipousuario_cdu->insertar=1;
                $detalle_tipousuario_cdu->modificar=1;
                $detalle_tipousuario_cdu->eliminar=1;
                $detalle_tipousuario_cdu->save();
            }

        Session::flash('success', 'TipoUsuario agregado exitosamente');
        return redirect()->route('gestionartipousuario.index');
    }

    public function show(TipoUsuario $tipousuario)
    {
        //
    }
    public function edit($id)
    {
        $tipousuario= TipoUsuario::findOrFail($id);
        return view('gestionartipousuario.edit', ['tipousuario' => $tipousuario]);
    }


    public function update(Request $request,$id)
    {
        request()->validate([
            'descripcion' => 'required',
        ]);

        $tipousuario= TipoUsuario::findOrFail($id);
        $tipousuario->descripcion=$request->descripcion;
        $tipousuario->update();

        return redirect()->route('gestionartipousuario.index')
            ->with('success','TipoUsuario Actualizado Correctamente');

    }

    public function destroy($id)
    {
        TipoUsuario::findOrFail($id)->delete();
        return redirect()->route('gestionartipousuario.index')
            ->with('success','TipoUsuario Eliminado Correctamente');

    }
}
