<?php

namespace App\Http\Controllers;

use App\Indicador;
use Illuminate\Http\Request;
use Session;

class IndicadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = \Request::get('descripcion');
        $indicadores = Indicador::where([['descripcion','like','%'.$search.'%'],])
            ->orderBy('descripcion')
            ->paginate(20);

        return view('gestionarindicador.index',compact('indicadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestionarindicador.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'descripcion' => 'required'
        ]);
        $indicador = new Indicador();
        $indicador->descripcion=$request->descripcion;
        $indicador->metrica=$request->metrica;
        $indicador->idmodelo=$request->idmodelo;
        $indicador->save();
        Session::flash('success', 'Indicador agregado exitosamente');
        return redirect()->route('gestionarindicador.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Indicador  $indicador
     * @return \Illuminate\Http\Response
     */
    public function show(Indicador $indicador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Indicador $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $indicador= Indicador::findOrFail($id);
        return view('gestionarindicador.edit', ['indicador' => $indicador]);
    }


    public function update(Request $request,$id)
    {
        request()->validate([
            'descripcion' => 'required',
        ]);

        $indicador= Indicador::findOrFail($id);
        $indicador->descripcion=$request->descripcion;
        $indicador->update();

        return redirect()->route('gestionarindicador.index')
            ->with('success','Indicador Actualizado Correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Indicador::findOrFail($id)->delete();
        return redirect()->route('gestionarindicador.index')
            ->with('success','Indicador Eliminado Correctamente');

    }
}
