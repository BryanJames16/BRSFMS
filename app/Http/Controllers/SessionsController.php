<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Servicetype;
use \App\User;

class SessionsController extends Controller
{
    public function destroy(){
        auth()->logout();
        return redirect('dashboard');
    }

    public function create(){
        return view('login');
    }

}
