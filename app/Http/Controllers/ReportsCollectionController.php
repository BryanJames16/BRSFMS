<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsCollectionController extends Controller
{
    public function index() {
        return view('collection-report');
    }

    public function fetch() {
        return view('collection-report');
    }
}
