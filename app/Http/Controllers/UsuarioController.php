<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Session;
class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = \App\Usuario::orderBy('id','ASC')->paginate(10);
        return view('gestionarusuario.index',compact('usuarios'));
    }

    public function create()
    {
        return view('gestionarusuario.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'apellido' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $usuario = new Usuario();
        $usuario->name=$request->name;
        $usuario->email=$request->email;
        $usuario->apellido=$request->apellido;
        $usuario->password=bcrypt($request->password);
        $usuario->ci=$request->ci;
        $usuario->idtipousuario=$request->idtipousuario;
        $usuario->idfacultad=$request->idfacultad;
        $usuario->save();

        Session::flash('success', 'Usuario agregado exitosamente');
        return redirect()->route('gestionarusuario.index');
    }

    public function show(Usuario $usuario)
    {
        //
    }
    public function edit($id)
    {
        $usuario= Usuario::findOrFail($id);

        return view('gestionarusuario.edit', ['usuario' => $usuario]);
    }


    public function update(Request $request,$id)
    {
        request()->validate([
            'name' => 'required',
            'apellido' => 'required',
            'password' => 'required',
        ]);

        $usuario= Usuario::findOrFail($id);
        $usuario->name=$request->name;
        $usuario->apellido=$request->apellido;
        $usuario->password=bcrypt($request->password);
        $usuario->ci=$request->ci;
        $usuario->idtipousuario=$request->idtipousuario;
        $usuario->idfacultad=$request->idfacultad;
        $usuario->update();

        return redirect()->route('gestionarusuario.index')
            ->with('success','Usuario Actualizado Correctamente');

    }

    public function destroy($id)
    {
        Usuario::findOrFail($id)->delete();
        return redirect()->route('gestionarusuario.index')
            ->with('success','Usuario Eliminado Correctamente');

    }
}
