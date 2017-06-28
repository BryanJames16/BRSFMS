<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Street;
use \App\Models\Barangay;
use \App\Models\Lot;
use \App\Models\Unit;
use \App\Models\House;

class ResidentRegistrationController extends Controller
{
    public function index() {
 
        
	return view('resident-registration',
		['barangays'=>Barangay::where([['status', 1],['archive', 0]])->pluck('barangayName', 'barangayID')],
		['streets'=>Street::where([['status', 1],['archive', 0]])->pluck('streetName', 'streetID')],
		['lots'=>Lot::where([['status', 1],['archive', 0]])->pluck('lotCode', 'lotID')]

		);

	
	}
}

