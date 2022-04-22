<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function list()
    {
        return view('rol.llistaRols')->with('rols', Rol::all());
    }

    public function create()
    {
        return view('rol.createRol');
    }

    public function save(Request $request)
    {
        $req = request()->all();
        $validated = $this->validaRol($request);


        $rol = new Rol();
        $rol->nom = $req['nom'];
        $rol->save();
        return redirect('/list-rol/');

    }

    public function edit($idRol)
    {
        return view('rol.editRol')->with('rol', Rol::find($idRol));
    }

    public function update(Request $req)
    {
        $validated = $this->validaRol($req);
        $data = $req->all();
        $rol = Rol::find($data['id']);
        $rol->nom = $data['nom'];
        $rol->save();
        return redirect('/list-rol');

    }

    public function delete($idRol)
    {
        $rol = Rol::find($idRol);
        $rol->delete();
        return redirect('/list-rol');
    }

    public function validaRol($request)
    {
        return $request->validate([
            'nom' => 'required'
        ]);
    }
}
