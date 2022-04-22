<?php

namespace App\Http\Controllers;

use App\Models\Joc;
use Illuminate\Http\Request;

class JocController extends Controller
{
    public function list()
    {
        return view('joc.llistaJocs')->with('jocs', Joc::all());
    }

    public function show($idJoc)
    {
        return view('joc.showJoc')->with('joc', Joc::find($idJoc));
    }

    public function create()
    {
        return view('joc.createJoc');
    }

    public function save(Request $request)
    {
        $req = request()->all();
        $min = $req['minJugadors'];
        $validated = $this->validaJoc($request);


        $joc = new Joc();
        $joc->nom = $req['nom'];
        $joc->descripcio = $req['descripcio'];
        $joc->minJugadors = $req['minJugadors'];
        $joc->maxJugadors = $req['maxJugadors'];
        $joc->save();
        return redirect('/show-joc/' . $joc->id);

    }

    public function edit($idJoc)
    {
        return view('joc.editJoc')->with('joc', Joc::find($idJoc));
    }

    public function update(Request $req)
    {
        $validated = $this->validaJoc($req);
        $data = $req->all();
        $joc = Joc::find($data['id']);
        $joc->nom = $data['nom'];
        $joc->descripcio = $data['descripcio'];
        $joc->minJugadors = $data['minJugadors'];
        $joc->maxJugadors = $data['maxJugadors'];
        $joc->save();
        return redirect('/show-joc/' . $joc->id);

    }

    public function delete($idJoc)
    {
        $joc = Joc::find($idJoc);
        $joc->delete();
        return redirect('/list-joc');
    }

    public function validaJoc($request)
    {
        return $request->validate([
            'nom' => 'required',
            'descripcio' => 'required',
            'minJugadors' => 'numeric|required|min:1',
            'maxJugadors' => 'numeric|required|gt:minJugadors'
        ]);
    }
}
