<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilitiesController extends Controller
{
    public function index() {
        $utilities = Utilities::all()->get();
        return view('utilities') -> with('utilities', $utilities);
    }

    public function store() {

    }

    public function getCurrentPK() {

    }

    public function update() {
        
    }
}