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

    public function getCurrentPK(Request $r) {
        if ($r -> ajax()) {
            return response(Utility::all()->last());
        }
        else {
            return view('errors.403');
        }
    }

    public function update(Request $r) {
        if ($r->ajax()) {
            $utilityRow = Utility::all()->last(); 

            if(is_null($utilityRow))
            {
                $insertRet = Utility::insert(['documentPK' => $r -> input('serviceTransactionPrimeID'),
                                                'docApprovalPK' => $r -> input('docApprovalPK'),
                                                'facilityPK' => $r -> input('facilityPK'),
                                                'familyPK' => $r -> input('familyPK'),
                                                'reservationPK' => $r -> input('reservationPK'),
                                                'residentPK' => $r -> input('residentPK'),
                                                'servicePK' => $r -> input('servicePK'),
                                                'serviceRegPK' => $r -> input('serviceRegPK'),
                                                'sponsorPK' => $r -> input('sponsorPK'),
                                                'docRequestPK' => $r -> input('docRequestPK')]);   
            }
            else
            {
                $utilityRow = Utility::all()->last(); 
                $utilityRow -> documentPK = $r -> input('documentPK');
                $utilityRow -> docApprovalPK = $r -> input('docApprovalPK');
                $utilityRow -> docRequestPK = $r -> input('docRequestPK'); 
                $utilityRow -> facilityPK = $r -> input('facilityPK');
                $utilityRow -> familyPK  = $r -> input('familyPK');
                $utilityRow -> reservationPK = $r -> input('reservationPK');
                $utilityRow -> residentPK = $r -> input('residentPK');
                $utilityRow -> servicePK  = $r -> input('servicePK');
                $utilityRow -> serviceRegPK = $r -> input('serviceRegPK');
                $utilityRow -> sponsorPK = $r -> input('sponsorPK');
                $utilityRow -> save();
                
                
            }

            return redirect('/utilities');
            
        }
        else {
            return view('errors.403');
        }
    }
}