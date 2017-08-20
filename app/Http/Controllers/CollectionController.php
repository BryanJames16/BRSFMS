<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index() {
        return view('collection');
    }

    public function getCollections(Request $r) {

    }
}
