<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Resident;
use \App\Models\Lot;
use \App\Models\Street;

class ResidentController extends Controller
{

    public function _construct(){

        $this->middleware('auth');
    }

    public function index() {
    	$residents = Resident::select('residentPrimeID','residentID', 'firstName','lastName','middleName','suffix', 'status', 'contactNumber', 'gender', 'birthDate', 'civilStatus','seniorCitizenID','disabilities', 'residentType')
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
        

        
            $stat = 0;
        

        $aah = Resident::insert(['residentID'=>trim($r -> input('residentID')),
                                            'firstName' => trim($r -> input('firstName')),
                                            'middleName' => trim($r -> input('middleName')),
                                            'lastName' => $r -> input('lastName'),
                                            'suffix' => $r -> input('suffix'),
											'contactNumber' => $r -> input('contactNumber'),
                                            'gender' => $r -> input('gender'),
											'birthDate' => $r -> input('birthDate'),
											'civilStatus' => $r -> input('civilStatus'),
											'seniorCitizenID' => $r -> input('seniorCitizenID'),
											'disabilities' => $r -> input('disabilities'),
											'residentType' => $r -> input('residentType'),
											   'status' => $stat]);


            return back();
        }

        public function getEdit(Request $r) {
        
        if($r->ajax())
        {
            return response(Resident::find($r->input('residentPrimeID')));
        }

    }
}

