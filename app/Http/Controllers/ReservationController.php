<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Person;
use \App\Models\Facility;
use \App\Models\Reservation;
use \App\Models\Collection;
use \App\Models\Utility;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use \App\Models\Log;

require_once(app_path() . '/Includes/pktool.php');

use StaticCounter;
use SmartMove;

class ReservationController extends Controller
{
    public $totalAmount = 0;

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
        $nonres= \DB::table('reservations') ->select('reservations.primeID','reservations.status','reservationName', 'reservationDescription', 'reservationStart','reservationEnd', 'dateReserved', 'facilities.facilityName', 'name','age','email','contactNumber') 
                                        ->join('facilities', 'reservations.facilityPrimeID', '=', 'facilities.primeID')
                                        ->where('reservations.peoplePrimeID', '=', null) 
                                        ->get();
        return view('facility-reservation')->with('reservations',$reservations)->with('nonres',$nonres);
    }

    public function refresh(Request $r) {
        if ($r -> ajax()) {
            return json_encode(\DB::table('reservations') ->select('reservations.primeID','reservations.status','reservationName', 'reservationDescription', 'reservationStart','reservationEnd', 'dateReserved', 'facilities.facilityName', 'residents.lastName','residents.firstName','residents.middleName') 
                                        ->join('facilities', 'reservations.facilityPrimeID', '=', 'facilities.primeID')
                                        ->join('residents', 'reservations.peoplePrimeID', '=', 'residents.residentPrimeID') 
                                        ->get());
        }
        else {
            return view('errors.403');
        }
    }

    public function refreshNonRes(Request $r) {
        if ($r -> ajax()) {
            return json_encode(\DB::table('reservations') ->select('reservations.primeID','reservations.status','reservationName', 'reservationDescription', 'reservationStart','reservationEnd', 'dateReserved', 'facilities.facilityName', 'name','age','email','contactNumber') 
                                        ->join('facilities', 'reservations.facilityPrimeID', '=', 'facilities.primeID')
                                        ->where('reservations.peoplePrimeID', '=', null) 
                                        ->get());
        }
        else {
            return view('errors.403');
        }
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

        $res = Reservation::all() -> last();

        $id = Auth::id();
           
        $log = Log::insert(['userID'=>$id,
                                            'action' => 'Reserved a facility',
                                            'dateOfAction' => Carbon::now(),
                                            'type' => 'Reservation',
                                            'reservationID' => $res -> primeID]);

        return redirect('facility-reservation');
    }

    public function residentStore(Request $r) {

        $this->validate($r, [
                'reservationName' => 'required|unique:reservations|max:30|min:5',
                'desc' => 'nullable|max:500|min:0',
                'startTime' => 'required',
                'endTime' => 'required',
                'date' => 'required|date|after_or_equal:today',
            ]);

        $insertRet = Reservation::insert(['reservationName'=>trim($r->input('reservationName')),
                                                'reservationDescription'=>trim($r->input('desc')),
                                                'reservationStart'=>$r->input('startTime'),
                                                'reservationEnd'=>$r->input('endTime'),
                                                'dateReserved'=>$r->input('date'),
                                                'peoplePrimeID'=>$r->input('peoplePrimeID'),
                                                'facilityPrimeID'=>$r->input('facilityPrimeID'),
                                                'status'=>'Pending']);

        $res = Reservation::all() -> last();

        $id = Auth::id();
           
        $log = Log::insert(['userID'=>$id,
                                            'action' => 'Reserved a facility',
                                            'dateOfAction' => Carbon::now(),
                                            'type' => 'Reservation',
                                            'reservationID' => $res -> primeID]);

        $totalAmount = 0;
        $hourDiff = 0;
        if (date('H', strtotime($r->input('startTime'))) >= 10 && 
            date('H', strtotime($r->input('startTime'))) < 18 && 
            date('H', strtotime($r->input('endTime'))) >= 10 && 
            date('H', strtotime($r->input('endTime'))) < 18) {
            $hourDiff = abs(strtotime($r->input('startTime')) - strtotime($r->input('endTime')));
            $hourDiff /= 3600;
            
            $morningPrice = Facility::select('facilityDayPrice')
                                    -> where('primeID', '=', $r->input('facilityPrimeID'))
                                    -> get();
            
            $totalAmount += $hourDiff * ($morningPrice[0] -> facilityDayPrice);
            
        } 
        else if (date('H', strtotime($r->input('startTime'))) >= 18 && 
                    date('H', strtotime($r->input('startTime'))) <= 22 && 
                    date('H', strtotime($r->input('endTime'))) >= 18 && 
                    date('H', strtotime($r->input('endTime'))) <= 22) {
            $hourDiff = abs(strtotime($r->input('startTime')) - strtotime($r->input('endTime')));
            $hourDiff /= 3600;

            $eveningPrice = Facility::select('facilityNightPrice')
                                -> where('primeID', '=', $r->input('facilityPrimeID'))
                                -> get();
            
            $totalAmount += $hourDiff * ($eveningPrice[0] -> facilityNightPrice);
        }
        else {
            $startHour = abs(date('H', strtotime($r->input('startTime'))) - 18);
            $endHour = abs(date('H', strtotime($r->input('endTime'))) - 17);

            $morningPrice = Facility::select('facilityDayPrice')
                                        -> where('primeID', '=', $r->input('facilityPrimeID'))
                                        -> get();

            $eveningPrice = Facility::select('facilityNightPrice')
                                -> where('primeID', '=', $r->input('facilityPrimeID'))
                                -> get();
            $morningAmount = $startHour * ($morningPrice[0] -> facilityDayPrice);
            $eveningAmount = $endHour * ($eveningPrice[0] -> facilityNightPrice);

            $totalAmount += $morningAmount + $eveningAmount;
        }
        
        $listOfCollection = Collection::select('collectionID') 
                                        ->get()
                                        ->last();
        $nextKey = "";
        if (is_null($listOfCollection)) {
            $collectionPK = Utility::select('collectionPK')->get()->last();
            $nextKey = StaticCounter::smart_next($collectionPK->collectionPK, SmartMove::$NUMBER);
        }
        else {
            $nextKey = StaticCounter::smart_next($listOfCollection -> collectionID, SmartMove::$NUMBER);
        }

        
        $latestReservation = Reservation::get()->last();
        $reservee = Reservation::select('peoplePrimeID')->get()->last();

        $collectionRet = Collection::insert(['collectionID' => $nextKey,
                                                'collectionDate' => Carbon::now(), 
                                                'collectionType' => 3, 
                                                'amount' => $totalAmount, 
                                                'status' => 'Pending', 
                                                'reservationPrimeID' => $latestReservation -> primeID, 
                                                'residentPrimeID' => $latestReservation -> peoplePrimeID]);
        
        return back();
    }

    public function nonresidentStore(Request $r) {


        $this->validate($r, [
                'reservationName' => 'required|unique:reservations|max:30|min:5',
                'desc' => 'nullable|max:500|min:0',
                'startTime' => 'required',
                'endTime' => 'required',
                'date' => 'required|date|after_or_equal:today',
                'name' => 'required|max:100|min:5',
                'age' => 'integer|required|min:10',
                'email' => 'email|required',
                'contactNumber' => 'numeric|required',
            ]);

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
        
        $res = Reservation::all() -> last();

        $id = Auth::id();
           
        $log = Log::insert(['userID'=>$id,
                                            'action' => 'Reserved a facility',
                                            'dateOfAction' => Carbon::now(),
                                            'type' => 'Reservation',
                                            'reservationID' => $res -> primeID]);

        $totalAmount = 0;
        $hourDiff = 0;
        if (date('H', strtotime($r->input('startTime'))) >= 10 && 
            date('H', strtotime($r->input('startTime'))) < 18 && 
            date('H', strtotime($r->input('endTime'))) >= 10 && 
            date('H', strtotime($r->input('endTime'))) < 18) {
            $hourDiff = abs(strtotime($r->input('startTime')) - strtotime($r->input('endTime')));
            $hourDiff /= 3600;
            
            $morningPrice = Facility::select('facilityDayPrice')
                                    -> where('primeID', '=', $r->input('facilityPrimeID'))
                                    -> get();
            
            $totalAmount += $hourDiff * ($morningPrice[0] -> facilityDayPrice);
            
        } 
        else if (date('H', strtotime($r->input('startTime'))) >= 18 && 
                    date('H', strtotime($r->input('startTime'))) <= 22 && 
                    date('H', strtotime($r->input('endTime'))) >= 18 && 
                    date('H', strtotime($r->input('endTime'))) <= 22) {
            $hourDiff = abs(strtotime($r->input('startTime')) - strtotime($r->input('endTime')));
            $hourDiff /= 3600;

            $eveningPrice = Facility::select('facilityNightPrice')
                                -> where('primeID', '=', $r->input('facilityPrimeID'))
                                -> get();
            
            $totalAmount += $hourDiff * ($eveningPrice[0] -> facilityNightPrice);
        }
        else {
            $startHour = abs(date('H', strtotime($r->input('startTime'))) - 18);
            $endHour = abs(date('H', strtotime($r->input('endTime'))) - 17);

            $morningPrice = Facility::select('facilityDayPrice')
                                        -> where('primeID', '=', $r->input('facilityPrimeID'))
                                        -> get();

            $eveningPrice = Facility::select('facilityNightPrice')
                                -> where('primeID', '=', $r->input('facilityPrimeID'))
                                -> get();
            $morningAmount = $startHour * ($morningPrice[0] -> facilityDayPrice);
            $eveningAmount = $endHour * ($eveningPrice[0] -> facilityNightPrice);

            $totalAmount += $morningAmount + $eveningAmount;
        }
        
        $listOfCollection = Collection::select('collectionID') 
                                        ->get()
                                        ->last();
        $nextKey = "";
        if (is_null($listOfCollection)) {
            $collectionPK = Utility::select('collectionPK')->get()->last();
            $nextKey = StaticCounter::smart_next($collectionPK->collectionPK, SmartMove::$NUMBER);
        }
        else {
            $nextKey = StaticCounter::smart_next($listOfCollection -> collectionID, SmartMove::$NUMBER);
        }

        
        $latestReservation = Reservation::get()->last();
        $reservee = Reservation::select('peoplePrimeID')->get()->last();

        $collectionRet = Collection::insert(['collectionID' => $nextKey,
                                                'collectionDate' => Carbon::now(), 
                                                'collectionType' => 3, 
                                                'amount' => $totalAmount, 
                                                'status' => 'Pending', 
                                                'reservationPrimeID' => $latestReservation -> primeID, 
                                                'peoplePrimeID' => $latestReservation -> peoplePrimeID]);

        return back();
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

            $id = Auth::id();
            
            $log = Log::insert(['userID'=>$id,
                                                'action' => 'Rescheduled a reservation',
                                                'dateOfAction' => Carbon::now(),
                                                'type' => 'Reservation',
                                                'reservationID' => $r->input('primeID')]);

             $this->validate($r, [
                'reservationName' => 'required|max:30|min:5',
                'reservationDescription' => 'nullable|max:500|min:0',
                'reservationStart' => 'required',
                'reservationEnd' => 'required',
                'dateReserved' => 'required|date|after_or_equal:today',
            ]);

            $aah = Reservation::insert(['reservationName'=>trim($r->input('reservationName')),
                                                'reservationDescription'=>trim($r->input('reservationDescription')),
                                                'reservationStart'=>$r->input('reservationStart'),
                                                'reservationEnd'=>$r->input('reservationEnd'),
                                                'dateReserved'=>$r->input('dateReserved'),
                                                'peoplePrimeID'=>$r->input('peoplePrimeID'),
                                                'facilityPrimeID'=>$r->input('facilityPrimeID'),
                                                'name'=>$r->input('name'),
                                                'age'=>$r->input('age'),
                                                'email'=>$r->input('email'),
                                                'contactNumber'=>$r->input('contactNumber'),
                                                'status'=>'Pending']);

            $res = Reservation::all() -> last();

            $id = Auth::id();
            
            $log = Log::insert(['userID'=>$id,
                                                'action' => 'Reserved a facility',
                                                'dateOfAction' => Carbon::now(),
                                                'type' => 'Reservation',
                                                'reservationID' => $res -> primeID]);

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

            $id = Auth::id();
            
            $log = Log::insert(['userID'=>$id,
                                                'action' => 'Cancelled a reservation',
                                                'dateOfAction' => Carbon::now(),
                                                'type' => 'Reservation',
                                                'reservationID' => $r->input('primeID')]);

            return redirect('facility-reservation');
        }
        else {
            return view('errors.403');
        }
    }

    public function getReservation(Request $r) {
        if ($r -> ajax()) {
            $cleanTime = $r->input('currentDateTime');
            $cleanTime = substr($cleanTime, 0, strpos($cleanTime, '('));
            $dateToday = date("Y-m-d", strtotime($cleanTime));
            $resvn = \DB::table('reservations')->where('status', '=', 'Pending') 
                                //-> whereMonth('dateReserved', '=', date("m", strtotime($cleanTime)))
                                //-> whereYear('dateReserved', '=', date("Y", strtotime($cleanTime)))
                                -> get();
            
            return json_encode($resvn);
        }
        else {
            return view('errors.403');
        }
    }
}
