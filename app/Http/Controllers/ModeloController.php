<?php

namespace App\Http\Controllers;

use App\Modelo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Session;


class ModeloController extends Controller
{
    public function index()
    {
        //$modelos = \App\Modelo::orderBy('id','ASC')->paginate(10);
        //return view('gestionarmodelo.index',compact('modelos'));


        $search = strtoupper(\Request::get('descripcion'));
        $modelos = Modelo::where([['descripcion','like','%'.$search.'%'],])
            ->orderBy('descripcion')
            ->paginate(20);

        return view('gestionarmodelo.index',compact('modelos'));

    }

    public function create()
    {
        return view('gestionarmodelo.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'descripcion' => 'required'
        ]);
        $modelo = new Modelo();
        $modelo->descripcion=$request->descripcion;
        $modelo->save();
        Session::flash('success', 'Modelo agregado exitosamente');
        return redirect()->route('gestionarmodelo.index');
    }

    public function show(Modelo $modelo)
    {
        //
    }
    public function edit($id)
    {
        $modelo= Modelo::findOrFail($id);
        return view('gestionarmodelo.edit', ['modelo' => $modelo]);
    }


    public function update(Request $request,$id)
    {
        request()->validate([
            'descripcion' => 'required',
        ]);

        $modelo= Modelo::findOrFail($id);
        $modelo->descripcion=$request->descripcion;
        $modelo->update();

        return redirect()->route('gestionarmodelo.index')
            ->with('success','Modelo Actualizado Correctamente');

    }

    public function destroy($id)
    {
        Modelo::findOrFail($id)->delete();
        return redirect()->route('gestionarmodelo.index')
            ->with('success','Modelo Eliminado Correctamente');

    }
}
