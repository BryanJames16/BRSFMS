<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Item;
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
}