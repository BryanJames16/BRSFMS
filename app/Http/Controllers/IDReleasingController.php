<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Collection;
use \App\Models\Facility;
use \App\Models\Reservation;
use \App\Models\Resident;
use \App\Models\Utility;
use \App\Models\Barangaycard;
use Carbon\Carbon;

class IDReleasingController extends Controller
{
    public function index() {
        
        $card = Barangaycard::select('cardID', 
                                            'released',
                                            'expirationDate', 
                                            'dateIssued', 
                                            'barangaycard.status',  
                                            'residents.firstName', 
                                            'residents.middleName', 
                                            'residents.lastName',
                                            'residents.residentID')
                        -> join('residents', 
                                    'barangaycard.rID', '=', 'residents.residentPrimeID')             
                        -> get();


        return view('id-releasing')
                                ->with('card', $card);
    }

    public function getEdit(Request $r) {
        if($r->ajax()) {
            return json_encode(\DB::table('residents') ->select('residents.residentPrimeID','imagePath','residentID', 'firstName',
                                                                'lastName','middleName','suffix', 'residents.status', 
                                                                'contactNumber', 'gender', 'birthDate',
                                                                'civilStatus','seniorCitizenID','disabilities',
                                                                'residentType','residentbackgrounds.currentWork', 
                                                                'residentBackgrounds.monthlyIncome','address','expirationDate','memID') 
                                        ->join('barangaycard', 'residents.residentPrimeID', '=', 'barangaycard.rID')
                                        ->join('residentBackgrounds', 'residents.residentPrimeID', '=', 'residentBackgrounds.peoplePrimeID')
                                        ->where('residents.status', '=', 1) 
                                        ->where('barangaycard.cardID', '=', $r->input('cardID')) 
                                        ->orderby('dateStarted','desc')
                                        ->orderby('backgroundPrimeID','desc') 
                                        ->limit(1)
                                        ->get());
        }
        else {
            return view('errors.403');
        }

    }

    public function release(Request $r) {

        $c = Barangaycard::find($r->input('cardID'));
        $c -> released = 1;
        $c -> save();                      

        return back();
    }

    public function refresh(Request $r) {
        if ($r -> ajax()) {
            return json_encode(\DB::table('barangaycard') ->select('cardID', 
                                            'released',
                                            'expirationDate', 
                                            'dateIssued', 
                                            'barangaycard.status',  
                                            'residents.firstName', 
                                            'residents.middleName', 
                                            'residents.lastName',
                                            'residents.residentID')
                        -> join('residents', 
                                    'barangaycard.rID', '=', 'residents.residentPrimeID')             
                        -> get());
        }
        else {
            return view('errors.403');
        }
    }
    
}


