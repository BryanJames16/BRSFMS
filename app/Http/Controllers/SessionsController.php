<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Servicetype;
use \App\User;
use Illuminate\Support\Facades\Auth;
use Input;

class SessionsController extends Controller
{
    public function destroy(){
        auth()->logout();
        return redirect('login');
    }

    public function create(){
        return view('login');
    }

    public function store(Request $r){
        
        $user = array(
            'email' => $r->input('email'),
            'password' => $r->input('password')
        );

        // echo"<script>console.log($r->('password'));</script>";
    }

}
