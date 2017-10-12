<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

class ItemReservationController extends Controller {
    public function index() {
        return view('item-reservation');
    }

    public function fetch() {
        
    }
}