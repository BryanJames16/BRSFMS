<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Utility;
use \Illuminate\Validation\Rule;

class UtilitiesController extends Controller
{
    public function index() {
        $utilities = Utility::all();
        return view('utilities') -> with('utilities', $utilities);
    }

    public function store() {

    }

    public function getCurrentPK() {

    }

    public function update() {
        
    }
}