<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Servicetype;

class SessionsController extends Controller
{
    public function destroy(){
        auth()->logout();
        return redirect()->home();
    }

    public function store(){

    }

}
