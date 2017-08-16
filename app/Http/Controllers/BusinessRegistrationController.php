<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Businesscategory;
use \App\Models\Resident;

class BusinessRegistrationController extends Controller
{
    public function index() {
        return view('business-registration');
    }

    public function store(Request $r) {
        if ($r->ajax()) {

        }
        else {
            return view('errors.403');
        }
    }

    public function getCategory(Request $r) {
        if ($r -> ajax()) {
            return (BusinessCategory::where("status", "=", 1)
                                ->where("archive", "=", 0)
                                ->get());
        }
        else {
            return view('errors.403');
        }
    }

    public function getOwner(Request $r) {
        if ($r -> ajax()) {
            return (Resident::where("status", "=", "1")->get());
        }
        else {
            return view('errors.403');
        }
    }
}