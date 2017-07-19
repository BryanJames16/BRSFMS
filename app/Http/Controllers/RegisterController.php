<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class RegisterController extends Controller
{
    public function create(){
        return view('register');
    }

    public function store(){

        $this->validate(request(),[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::create(request(['name', 'email', 'password']));

        auth()->login($user);

        return redirect('login');
    }
}
