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
            'firstName' => 'required',
            'lastName' => 'required'
        ]);

        $user = User::create([
            'name' => request('name'), 
            'email' => request('email'),
            'firstName' => request('firstName'), 
            'middleName' => request('middleName'), 
            'lastName' => request('lastName'), 
            'suffix' => request('suffix'), 
            'imagePath' => request('imagePath'),  
            'password' => bcrypt(request('password')) 
            ]);

        return redirect('login');
    }
}
