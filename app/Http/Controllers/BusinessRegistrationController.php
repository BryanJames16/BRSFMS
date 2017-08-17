<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Businesscategory;
use \App\Models\Resident;
use \App\Models\Businessregistration;
use Carbon\Carbon;

class BusinessRegistrationController extends Controller
{
    public function index() {
        return view('business-registration');
    }

    public function store(Request $r) {
        if ($r->ajax()) {
            $insertRet = Businessregistration::insert([
                'businessID' => $r->input('businessID'),
                'originalName' => $r->input('originalName'), 
                'tradeName' => $r->input('tradeName'), 
                'residentPrimeID' => $r->input('operatorName'), 
                'registrationDate' => Carbon::now(), 
                'archive' => 0
            ]);
            
            dd($insertRet);

            return back();
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

    public function getBusiness(Request $r) {
        if ($r -> ajax()) {
            return json_encode(
                Businessregistration::join('residents', 
                                            'residents.residentPrimeID', 
                                            '=', 
                                            'businessregistrations.residentPrimeID') 
                                        ->where("archive", "=", "0")
                                        ->get()
            );
        }
        else {
            return view('errors.403');
        }
    }
}