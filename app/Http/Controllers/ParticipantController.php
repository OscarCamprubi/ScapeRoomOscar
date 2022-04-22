<?php

namespace App\Http\Controllers;

use App\Models\Joc;
use App\Models\Participant;
use App\Models\Sala;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function list()
    {
        return view('participant.llistaParticipants')->with('participants', Participant::all());
    }

    public function create()
    {
        return view('participant.createParticipant');
    }

    public function save(Request $request)
    {
        $req = request()->all();
        $validated = $this->validaParticipant($request);


        $participant = new Participant();
        $participant->nom = $req['nom'];
        $participant->save();
        return redirect('/list-participant/');

    }

    public function edit($idParticipant)
    {
        return view('participant.editParticipant')->with('participant', Participant::find($idParticipant));
    }

    public function update(Request $req)
    {
        $validated = $this->validaParticipant($req);
        $data = $req->all();
        $sala = Participant::find($data['id']);
        $sala->nom = $data['nom'];
        $sala->save();
        return redirect('/list-participant');

    }

    public function delete($idParticipant)
    {
        $participant = Participant::find($idParticipant);
        $participant->delete();
        return redirect('/list-participant');
    }

    public function validaParticipant($request)
    {
        return $request->validate([
            'nom' => 'required'
        ]);
    }
}
