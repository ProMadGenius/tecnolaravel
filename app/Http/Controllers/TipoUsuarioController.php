<?php

namespace App\Http\Controllers;

use App\TipoUsuario;
use Illuminate\Http\Request;

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
