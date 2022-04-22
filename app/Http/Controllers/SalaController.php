<?php

namespace App\Http\Controllers;

use App\Models\Joc;
use App\Models\Sala;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    public function list()
    {
        return view('sala.llistaSales')->with('sales', Sala::all());
    }

    public function create()
    {
        return view('sala.createSala')->with('jocs', Joc::all());
    }

    public function save(Request $request)
    {
        $req = request()->all();
        $validated = $this->validaSala($request);


        $sala = new Sala();
        $sala->joc_id = $req['idJoc'];
        $sala->aforament = $req['aforament'];
        $sala->save();
        return redirect('/list-sala/');

    }

    public function edit($idSala)
    {
        return view('sala.editSala')->with(['sala' => Sala::find($idSala), 'jocs' => Joc::all()]);
    }

    public function update(Request $req)
    {
        $validated = $this->validaSala($req);
        $data = $req->all();
        $sala = Sala::find($data['id']);
        $sala->aforament = $data['aforament'];
        $sala->joc_id = $data['idJoc'];
        $sala->save();
        return redirect('/list-sala');

    }

    public function delete($idSala)
    {
        $sala = Sala::find($idSala);
        $sala->delete();
        return redirect('/list-sala');
    }

    public function validaSala($request)
    {
        return $request->validate([
            'idJoc' => 'required',
            'aforament' => 'required|numeric|min:1'
        ]);
    }
}
