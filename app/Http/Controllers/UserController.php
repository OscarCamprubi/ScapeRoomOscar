<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list()
    {
        return view('user.llistaUsers')->with('users', User::all());
    }

    public function show($idUser)
    {
        return view('user.showUser')->with('user', User::find($idUser));
    }

    public function create()
    {
        return view('user.createUser');
    }

    public function save(Request $request)
    {
        $req = request()->all();
        $validated = $this->validaUser($request);


        $user = new User();
        $user->name = $req['nom'];
        $user->email = $req['email'];
        $user->password = $req['password'];
        $user->bornDate = $req['bornDate'];
        $user->save();
        return redirect('/show-user/' . $user->id);

    }

    public function edit($idUser)
    {
        return view('user.editUser')->with('user', User::find($idUser));
    }

    public function update(Request $request)
    {
        $req = request()->all();
        $validated = $this->validaUser($request);


        $user = User::find($req['id']);
        $user->name = $req['nom'];
        $user->email = $req['email'];
        $user->password = $req['password'];
        $user->save();
        return redirect('/show-user/' . $user->id);

    }

    public function delete($idUser)
    {
        $user = User::find($idUser);
        $user->delete();
        return redirect('/list-user');
    }

    public function validaUser($request)
    {
        return $request->validate([
            'nom' => 'required',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:5|max:20',
            'bornDate' => 'required|date'
        ]);
    }
}
