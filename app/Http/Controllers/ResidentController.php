<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Resident;
use \App\Models\Lot;
use \App\Models\Street;

class ResidentController extends Controller
{
    public function index() {
    	$residents = Resident::select('residentPrimeID','residentID', 'firstName','lastName','middleName','suffix', 'status', 'contactNumber', 'gender', 'birthdate', 'civilStatus','seniorCitizenID','disabilities', 'residentType')
    												-> get();

    	return view('resident',['streets'=>Street::where([['status', 1],['archive', 0]])->pluck('streetName', 'streetID')],
		['lots'=>Lot::where([['status', 1],['archive', 0]])->pluck('lotCode', 'lotID')]) -> with('residents', $residents);


    }

    public function refresh(Request $r) {
        if ($r -> ajax()) {
            return json_encode(Resident::where("status", "!=", "0") -> get());
        }
    }

	public function store(Request $r) {

        $this->validate($r, [
            'residentID' => 'required|unique:documents|max:20'
        ]);
        

        if($r -> input('status') == "active") {
            $stat = 1;
        }
        else if($r -> input('status') == "inactive") {
            $stat = 0;
        }
        else {

        }

        $aah = Resident::insert(['residentID'=>trim($r -> input('residentID')),
                                            'firstName' => trim($r -> input('firstName')),
                                            'middleName' => trim($r -> input('middleName')),
                                            'lastName' => $r -> input('lastName'),
                                            'suffix' => $r -> input('suffix'),
											'contactNumber' => $r -> input('contactNumber'),
                                            'gender' => $r -> input('gender'),
											'birthdate' => $r -> input('birthdate'),
											'civilStatus' => $r -> input('civilStatus'),
											'seniorCitizenID' => $r -> input('seniorCitizenID'),
											'disabilities' => $r -> input('disabilities'),
											'residentType' => $r -> input('residentType'),
											   'status' => $stat]);


            return back();
        }
}

