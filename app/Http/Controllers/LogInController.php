<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogInController
{
    public function login()
    {
        return view('login.login');
    }

    public function checkLogin()
    {
        $credentials = Request::only('email', 'password');
        if (!Auth::once($credentials)) {

        }

        $user = Auth::getUser();
    }


}
