<?php

namespace App\Http\Controllers;

use App\Encuesta;
use Illuminate\Http\Request;
use Session;
class EncuestaController extends Controller
{
    public function index()
    {
        //$encuestas = \App\Encuesta::orderBy('id','ASC')->paginate(10);

        $search = (\Request::get('idfacultad'));
        if ($search != NULL){
            $encuestas = Encuesta::where([['idfacultad','=',$search],])
                ->orderBy('idfacultad')
                ->paginate(20);
            return view('gestionarencuesta.index',compact('encuestas'));
        }

        $encuestas = \App\Encuesta::orderBy('id','ASC')->paginate(10);
        return view('gestionarencuesta.index',compact('encuestas'));



    }

    public function create()
    {
        return view('gestionarencuesta.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'fechainicio' => 'required',
            'fechafin' => 'required'
        ]);
        $encuesta = new Encuesta();
        $encuesta->idfacultad=$request->idfacultad;
        $encuesta->fechainicio=$request->fechainicio;
        $encuesta->fechafin=$request->fechafin;
        $encuesta->idusuario1=$request->idusuario1;
        $encuesta->idusuario2=$request->idusuario2;
        $encuesta->idusuario3=$request->idusuario3;
        $encuesta->idusuario4=$request->idusuario4;
        $encuesta->idusuario5=$request->idusuario5;
        $encuesta->idusuario6=$request->idusuario6;
        $encuesta->idusuario7=$request->idusuario7;
        $encuesta->idusuario8=$request->idusuario8;
        $encuesta->idusuario9=$request->idusuario9;
        $encuesta->idusuario10=$request->idusuario10;
        $encuesta->save();
        Session::flash('success', 'Encuesta agregado exitosamente');
        return redirect()->route('gestionarencuesta.index');
    }

    public function show(Encuesta $encuesta)
    {
        //
    }
    public function edit($id)
    {
        $encuesta= Encuesta::findOrFail($id);
        return view('gestionarencuesta.edit', ['encuesta' => $encuesta]);
    }


    public function update(Request $request,$id)
    {
        request()->validate([
            'descripcion' => 'required',
        ]);

        $encuesta= Encuesta::findOrFail($id);
        $encuesta->descripcion=$request->descripcion;
        $encuesta->update();

        return redirect()->route('gestionarencuesta.index')
            ->with('success','Encuesta Actualizado Correctamente');

    }

    public function destroy($id)
    {
        Encuesta::findOrFail($id)->delete();
        return redirect()->route('gestionarencuesta.index')
            ->with('success','Encuesta Eliminado Correctamente');

    }
}
