<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Person;
use \App\Models\Facility;
use \App\Models\Reservation;

class ReservationController extends Controller
{

    public function populate() {
        return view('facility-reservation',
                        ['facilities' => 
                                Facility::where([['status', 1], 
                                                ['archive', 0]])
                                                ->pluck('facilityName', 'primeID')],
                        ['people'=>Person::where([['status', 1], 
                                                ['archive', 0]]) 
                                                ->get()]

        );
    }

    public function updateCombobox(Request $r) {
        if ($r -> ajax()) {
            return json_encode(Person::where("archive", "!=", "1") 
                                        ->where("status", "!=", "0")
                                        -> get());
        }
        else {
            return view('errors.403');
        }
    }

   public function index() {
        $reservations= \DB::table('reservations') ->select('reservations.primeID','reservations.status','reservationName', 'reservationDescription', 'reservationStart','reservationEnd', 'dateReserved', 'facilities.facilityName', 'residents.lastName','residents.firstName','residents.middleName') 
                                        ->join('facilities', 'reservations.facilityPrimeID', '=', 'facilities.primeID')
                                        ->join('residents', 'reservations.peoplePrimeID', '=', 'residents.residentPrimeID') 
                                        ->get();
        return view('facility-reservation')->with('reservations',$reservations);
    }

    public function store(Request $r) {
        $insertRet = Reservation::insert(['reservationName'=>trim($r->name),
                                                'reservationDescription'=>trim($r->desc),
                                                'reservationStart'=>$r->startTime,
                                                'reservationEnd'=>$r->endTime,
                                                'dateReserved'=>$r->date,
                                                'peoplePrimeID'=>$r->peoplePrimeID,
                                                'facilityPrimeID'=>$r->facilityPrimeID,
                                                'status'=>'Pending']);

            return redirect('facility-reservation');
    }

    public function residentStore(Request $r) {
        $insertRet = Reservation::insert(['reservationName'=>trim($r->input('reservationName')),
                                                'reservationDescription'=>trim($r->input('desc')),
                                                'reservationStart'=>$r->input('startTime'),
                                                'reservationEnd'=>$r->input('endTime'),
                                                'dateReserved'=>$r->input('date'),
                                                'peoplePrimeID'=>$r->input('peoplePrimeID'),
                                                'facilityPrimeID'=>$r->input('facilityPrimeID'),
                                                'status'=>'Pending']);

            return back();
    }

    public function nonresidentStore(Request $r) {
        $insertRet = Reservation::insert(['reservationName'=>trim($r->input('reservationName')),
                                                'reservationDescription'=>trim($r->input('desc')),
                                                'reservationStart'=>$r->input('startTime'),
                                                'reservationEnd'=>$r->input('endTime'),
                                                'dateReserved'=>$r->input('date'),
                                                'name'=>$r->input('name'),
                                                'age'=>$r->input('age'),
                                                'email'=>$r->input('email'),
                                                'contactNumber'=>$r->input('contactNumber'),
                                                'facilityPrimeID'=>$r->input('facilityPrimeID'),
                                                'status'=>'Pending']);

            return back();
    }

    public function getEdit(Request $r) {
        if($r->ajax()) {
            return json_encode(\DB::table('reservations') ->select('reservations.primeID','reservations.status','reservationName', 'reservationDescription', 'reservationStart','reservationEnd', 'dateReserved', 'facilities.facilityName', 'people.lastName','people.firstName','people.middleName') 
                                        ->join('facilities', 'reservations.facilityPrimeID', '=', 'facilities.primeID')
                                        ->join('people', 'reservations.peoplePrimeID', '=', 'people.peoplePrimeID') 
                                        ->where('reservations.primeID','=', $r->input('primeID'))
                                        ->get());
        }
        else {
            return view('errors.403');
        }
    }

    public function getResidents(Request $r) {
        if($r->ajax()) {
            return json_encode( \DB::table('residents') ->select('residentPrimeID','residentID','imagePath','firstName','middleName', 'lastName','birthDate',
                                                    'gender') 
                                        ->where('status', '=', 1)
                                        ->get());
        }
        else {
            return view('errors.403');
        }
    }

    public function getFacilities(Request $r) {
        if($r->ajax()) {
            return json_encode( \DB::table('facilities') ->select('primeID','facilityName') 
                                        ->where('status', '=', 1)
                                        ->where('archive', '=', 0)
                                        ->get());
        }
        else {
            return view('errors.403');
        }
    }

    public function update(Request $r) {
        if ($r->ajax()) {
            $reservation = Reservation::find($r->input('primeID'));
            $reservation->status = 'Rescheduled';
            $reservation->save();

            $aah = Reservation::insert(['reservationName'=>trim($r->name),
                                                'reservationDescription'=>trim($r->desc),
                                                'reservationStart'=>$r->startTime,
                                                'reservationEnd'=>$r->endTime,
                                                'dateReserved'=>$r->date,
                                                'peoplePrimeID'=>$r->peoplePrimeID,
                                                'facilityPrimeID'=>$r->facilityPrimeID,
                                                'status'=>'Pending']);

            return redirect('facility-reservation');
        }
        else {
            return view('errors.403');
        }
    }

    public function delete(Request $r) {
        if ($r->ajax()) {
            $reservation = Reservation::find($r->input('primeID'));
            $reservation->status = 'Cancelled';
            $reservation->save();
            return redirect('facility-reservation');
        }
        else {
            return view('errors.403');
        }
    }
}
