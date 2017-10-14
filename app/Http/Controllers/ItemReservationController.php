<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Item;
use \App\Models\Person;
use \App\Models\Resident;
use \App\Models\Itemreservation;
use \App\Models\Collection;
use \App\Models\Log;
use Carbon\Carbon;

class ItemReservationController extends Controller {
    public function index() {
        /*
        $reservations = \DB::table('reservations') ->select('reservations.primeID','reservations.status','reservationName', 'reservationDescription', 'reservationStart','reservationEnd', 'dateReserved', 'facilities.facilityName', 'residents.lastName','residents.firstName','residents.middleName') 
                ->join('facilities', 'reservations.facilityPrimeID', '=', 'facilities.primeID')
                ->join('residents', 'reservations.peoplePrimeID', '=', 'residents.residentPrimeID') 
                ->get();
        $nonres = \DB::table('reservations') ->select('reservations.primeID','reservations.status','reservationName', 'reservationDescription', 'reservationStart','reservationEnd', 'dateReserved', 'facilities.facilityName', 'name','age','email','contactNumber') 
                ->join('facilities', 'reservations.facilityPrimeID', '=', 'facilities.primeID')
                ->where('reservations.peoplePrimeID', '=', null) 
                ->get();
        */
        return view('item-reservation');
    }

    public function store(Request $r) {
        if ($r -> ajax()) {
            $insertRet = ItemReservation::insert(['reservationName' => trim($r -> input('name')),
                                                    'reservationDescription' => trim($r->desc),
                                                    'reservationStart' => $r->startTime,
                                                    'reservationEnd' => $r->endTime,
                                                    'dateReserved' => $r->date,
                                                    'peoplePrimeID' => $r->peoplePrimeID,
                                                    'facilityPrimeID' => $r->facilityPrimeID,
                                                    'status'=>'Pending']);

            $res = ItemReservation::all() -> last();
            $id = Auth::id();

            $log = Log::insert(['userID' => $id,
                                'action' => 'Reserved a facility',
                                'dateOfAction' => Carbon::now(),
                                'type' => 'Reservation',
                                'reservationID' => $res -> primeID]);

            return redirect('/item-reservation');
        }
        else {

        }
    }

    public function getResidents(Request $r) {
        if($r -> ajax()) {
            return json_encode( Resident::where('status', '=', 1)
                                            ->get());
        }
        else {
            return view('errors.403');
        }
    }

    public function getItems(Request $r) {
        if($r -> ajax()) {
            return json_encode( Item::where('status', '=', 1) 
                                        -> get());
        }
        else {
            return view('errors.403');
        }
    }

    public function getRes(Request $r) {
        if($r -> ajax()) {
            return json_encode(ItemReservation::select('peoplePrimeID') 
                                                -> where('primeID', '=', $r -> input('primeID')) 
                                                -> get());
        }
        else {
            return view('errors.403');
        }
    }

    public function getEditNonRes(Request $r) {
        if($r -> ajax()) {
            return json_encode(ItemReservation::select('*') 
                                        -> join('facilities', 'ItemReservation.facilityPrimeID', '=', 'facilities.primeID')
                                        -> where('ItemReservation.peoplePrimeID', '=', null) 
                                        -> where('ItemReservation.primeID', '=', $r -> input('primeID')) 
                                        -> get());
        }
        else {
            return view('errors.403');
        }
    }

    public function getEdit(Request $r) {
        if($r -> ajax()) {
            return json_encode(ItemReservation::select('ItemReservations.primeID', 'peoplePrimeID', 
                                                        'ItemReservations.facilityPrimeID',  
                                                        'ItemReservations.status', 'reservationName', 
                                                        'reservationDescription', 'reservationStart', 
                                                        'reservationEnd', 'dateReserved', 
                                                        'facilities.facilityName',  
                                                        'residents.contactNumber', 'residents.gender', 
                                                        'residents.lastName', 'residents.firstName', 
                                                        'residents.middleName') 
                                        ->join('facilities', 'ItemReservations.facilityPrimeID', '=', 'facilities.primeID')
                                        ->join('residents', 'ItemReservations.peoplePrimeID', '=', 'residents.residentPrimeID') 
                                        ->where('ItemReservations.primeID','=', $r->input('primeID'))
                                        ->get());
        }
        else {
            return view('errors.403');
        }
    }

    public function gReservation(Request $r) {
        if ($r -> ajax()) {
            $cleanTime = $r->input('currentDateTime');
            $cleanTime = substr($cleanTime, 0, strpos($cleanTime, '('));
            $dateToday = date("Y-m-d", strtotime($cleanTime));
            $resvn = ItemReservation::where('status', '=', 'Pending') 
                                    -> get();
            
            return json_encode($resvn);
        }
        else {
            return view('errors.403');
        }
    }
}