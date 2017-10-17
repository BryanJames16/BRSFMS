<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Resident;
use \App\Models\Family;
use \App\Models\Servicetransaction;
use \App\Models\Reservation;
use \App\Models\Documentrequest;
use \Illuminate\Validation\Rule;
use Carbon\Carbon;

require_once(app_path() . '/Includes/pktool.php');

use StaticCounter;
use SmartMove;

class DashboardController extends Controller
{
    public function index() {
        
        $residents = Resident::where("status", "=", 1)->count();
        $family = Family::where("archive", "=", 0)->count();
        $pendingres = Reservation::where("status", "=", "Pending")->count();
        $pendingser = Servicetransaction::where("status", "=", "Pending")
                                        ->where('archive','=',0)
                                        ->count();
        $request = Documentrequest::where("status", "=", "Pending")->count();
        $approval = Documentrequest::where("status", "=", "Waiting for approval")->count();

        $dateToday = Carbon::now();

        $listOfReservations = Reservation::select("reservations.dateReserved", 
                                                    "reservations.reservationStart", 
                                                    "reservations.reservationEnd", 
                                                    "reservations.facilityPrimeID", 
                                                    "reservations.peoplePrimeID", 
                                                    "reservations.eventStatus",
                                                    "residents.firstName", 
                                                    "residents.middleName", 
                                                    "residents.lastName", 
                                                    "residents.suffix", 
                                                    "facilities.facilityName")
                                            -> join('facilities', 'reservations.facilityPrimeID', '=', 'facilities.primeID')
                                            -> join('residents', 'reservations.peoplePrimeID', '=', 'residents.residentPrimeID')
                                            -> where("eventStatus", "=", "NYD")
                                            -> whereYear("dateReserved", "=", $dateToday -> year)
                                            -> whereMonth("dateReserved", "=", $dateToday -> month)
                                            -> whereDay("dateReserved", "=", $dateToday -> day)
                                            -> get();
        
        $listOfNReservations = Reservation::select("reservations.dateReserved", 
                                                    "reservations.reservationStart", 
                                                    "reservations.reservationEnd", 
                                                    "reservations.facilityPrimeID", 
                                                    "reservations.peoplePrimeID", 
                                                    "reservations.eventStatus",
                                                    "reservations.name", 
                                                    "facilities.facilityName")
                                            -> join("facilities", "reservations.facilityPrimeID", "=", "facilities.primeID")
                                            -> where("eventStatus", "=", "NYD")
                                            -> whereNull("peoplePrimeID")
                                            -> whereYear("dateReserved", "=", $dateToday -> year)
                                            -> whereMonth("dateReserved", "=", $dateToday -> month)
                                            -> whereDay("dateReserved", "=", $dateToday -> day)
                                            -> get();

        return view('dashboard')->with('residents', $residents)
                                ->with('family', $family)
                                ->with('pendingres', $pendingres)
                                ->with('pendingser', $pendingser)
                                ->with('request', $request)
                                ->with('approval', $approval)
                                ->with('listOfReservations', $listOfReservations)
                                ->with('listOfNReservations', $listOfNReservations);
    }

    public function getRawData() {

    }
    
    public function getCard(Request $r) {
        if ($r->ajax()) {
            $card = new CardClass();
            $card->population = Resident::where("status", "=", 1)->count();
            $card->reservation = Reservation::where("reservationStart", ">", new \DateTime('today'))
                                    ->where("status", "=", "Pending")
                                    ->where("status", "=", "pending")
                                    ->count();
            $card->request = Documentrequest::where("status", "=", "Pending")
                                                ->where("status", "=", "pending")
                                                ->count();
            return json_encode($card);
        }
        else {
            return view('errors.403');
        }
    }

    public function getGraph() {

    }

    public function getTable() {

    }

    public function getChart() {

    }
}

class CardClass 
{
    public $population = 0;
    public $reservation = 0;
    public $request = 0;
    public $pendingService = 0;
}