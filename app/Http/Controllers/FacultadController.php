<?php

namespace App\Http\Controllers;

use App\Facultad;
use Illuminate\Http\Request;

class FacultadController extends Controller
{
    public function index()
    {
        //$facultads = \App\Facultad::orderBy('id','ASC')->paginate(10);

        $search = (\Request::get('descripcion'));
        $facultads = Facultad::where([['descripcion','like','%'.$search.'%'],])
            ->orderBy('descripcion')
            ->paginate(20);
        return view('gestionarfacultad.index',compact('facultads'));

    }

    public function create()
    {
        return view('gestionarfacultad.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'descripcion' => 'required'
        ]);
        $facultad = new Facultad();
        $facultad->descripcion=$request->descripcion;
        $facultad->save();
        Session::flash('success', 'Facultad agregado exitosamente');
        return redirect()->route('gestionarfacultad.index');
    }

    public function show(Facultad $facultad)
    {
        //
    }
    public function edit($id)
    {
        $facultad= Facultad::findOrFail($id);
        return view('gestionarfacultad.edit', ['facultad' => $facultad]);
    }


    public function update(Request $request,$id)
    {
        request()->validate([
            'descripcion' => 'required',
        ]);

        $facultad= Facultad::findOrFail($id);
        $facultad->descripcion=$request->descripcion;
        $facultad->update();

        return redirect()->route('gestionarfacultad.index')
            ->with('success','Facultad Actualizado Correctamente');

    }

    public function destroy($id)
    {
        Facultad::findOrFail($id)->delete();
        return redirect()->route('gestionarfacultad.index')
            ->with('success','Facultad Eliminado Correctamente');

    }
}
