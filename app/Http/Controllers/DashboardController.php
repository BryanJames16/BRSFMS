<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Resident;
use \App\Models\Reservation;
use \App\Models\Documentrequest;
use \Illuminate\Validation\Rule;

require_once(app_path() . '/Includes/pktool.php');

use StaticCounter;
use SmartMove;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard');
    }

    public function getRawData() {

    }
    
    public function getCard(Request $r) {
        if ($r->ajax()) {
            $card = new CardClass();
            $card->population = Resident::all()->count();
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