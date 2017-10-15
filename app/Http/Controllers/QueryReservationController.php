<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Resident;
use \App\Models\Facility;
use \App\Models\Family;
use \App\Models\Utility;
use \App\Models\Generaladdress;
use \App\Models\Familymember;
use \App\Models\Residentbackground;
use Carbon\Carbon;

require_once(app_path() . '/Includes/pktool.php');

use StaticCounter;
use SmartMove;

class QueryReservationController extends Controller
{

    

    public function index() {
    	$facility = Facility::select('primeID','facilityName')
    												-> where('status','1')
                                                    -> where('archive','0')
                                                    -> get();
        

    	return view('query-reservation')
                                -> with('facility', $facility);
    }

    public function getQuery(Request $r) {
        if ($r -> ajax()) {
            return json_encode(\DB::table('reservations') 
                                    ->select('reservations.primeID','reservations.status','reservationName', 
                                            'reservationDescription', 'reservationStart','reservationEnd', 
                                            'dateReserved', 'facilities.facilityName') 
                                        ->join('facilities', 'reservations.facilityPrimeID', '=', 'facilities.primeID')
                                        ->whereBetween('dateReserved',[$r->input('fromDate'),$r->input('toDate')])
                                        ->where('reservations.status','like','%'.$r->input('status').'%')
                                        ->where('reservations.reservationName','like','%'.$r->input('rName').'%')
                                        ->where('reservations.facilityPrimeID','like','%'.$r->input('facility').'%')
                                        ->get());
        }
        else {
            return view('errors.403');
        }

    }

    public function getEdit(Request $r) {
        if($r->ajax()) {
            return json_encode(\DB::table('reservations') ->select('reservations.primeID','peoplePrimeID','reservations.facilityPrimeID','reservations.status','reservationName', 'reservationDescription', 'reservationStart','reservationEnd', 'dateReserved', 'facilities.facilityName', 'residents.contactNumber','residents.gender','residents.lastName','residents.firstName','residents.middleName') 
                                        ->join('facilities', 'reservations.facilityPrimeID', '=', 'facilities.primeID')
                                        ->join('residents', 'reservations.peoplePrimeID', '=', 'residents.residentPrimeID') 
                                        ->where('reservations.primeID','=', $r->input('primeID'))
                                        ->get());
        }
        else {
            return view('errors.403');
        }
    }

    public function getEditNonRes(Request $r) {
        if($r->ajax()) {
            return json_encode(\DB::table('reservations') ->select('reservations.primeID','reservations.facilityPrimeID','reservations.status','reservationName', 'reservationDescription', 'reservationStart','reservationEnd', 'dateReserved', 'facilities.facilityName', 'name','age','email','contactNumber') 
                                        ->join('facilities', 'reservations.facilityPrimeID', '=', 'facilities.primeID')
                                        ->where('reservations.peoplePrimeID', '=', null) 
                                        ->where('reservations.primeID', '=', $r->input('primeID')) 
                                        ->get());
        }
        else {
            return view('errors.403');
        }
    }

    public function getRes(Request $r) {
        if($r->ajax()) {
            return json_encode(\DB::table('reservations') ->select('peoplePrimeID') 
                                        ->where('primeID', '=', $r->input('primeID')) 
                                        ->get());
        }
        else {
            return view('errors.403');
        }
    }

    

	

  
}

