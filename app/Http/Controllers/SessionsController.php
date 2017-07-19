<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Servicetype;
use \App\User;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function destroy(){
        auth()->logout();
        return redirect('login');
    }

    public function create(){
        return view('login');
    }

    public function store(){
        if(Auth::attempt(['email' => $email, 'password' => $password])){
            return redirect('dasboard');
        }

        
    }

}
