<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

class ItemController extends Controller {
    public function index() {
        return view('item');
    }

    public function fetch() {
        
    }
}