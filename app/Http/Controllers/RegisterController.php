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

        $user = User::create([
            'name' => request('name'), 
            'email' => request('email'), 
            'password' => bcrypt(request('password')) 
            ]);

        return redirect('login');
    }
}
