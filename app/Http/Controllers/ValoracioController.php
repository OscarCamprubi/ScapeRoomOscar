<?php

namespace App\Http\Controllers;

use App\Models\Valoracio;
use Illuminate\Http\Request;

class ValoracioController extends Controller
{
    public function list()
    {
        return view('valoracio.llistaValoracions')->with('valoracions', Valoracio::all());
    }

    public function create()
    {
        return view('valoracio.createValoracio');
    }

    public function save(Request $request)
    {
        $req = request()->all();
        $validated = $this->validaValoracio($request);


        $valoracio = new Valoracio();
        $valoracio->numValoracio = $req['numValoracio'];
        $valoracio->textValoracio = $req['textValoracio'];
        $valoracio->save();
        return redirect('/list-valoracio/');

    }

    public function edit($idValoracio)
    {
        return view('valoracio.editValoracio')->with('valoracio', Valoracio::find($idValoracio));
    }

    public function update(Request $req)
    {
        $validated = $this->validaValoracio($req);
        $data = $req->all();
        $valoracio = Valoracio::find($data['id']);
        $valoracio->numValoracio = $req['numValoracio'];
        $valoracio->textValoracio = $req['textValoracio'];
        $valoracio->save();
        return redirect('/list-valoracio');

    }

    public function delete($idValoracio)
    {
        $valoracio = Valoracio::find($idValoracio);
        $valoracio->delete();
        return redirect('/list-valoracio');
    }

    public function validaValoracio($request)
    {
        return $request->validate([
            'numValoracio' => 'required|numeric|min:1|max:5',
            'textValoracio' => 'required'
        ]);
    }
}
