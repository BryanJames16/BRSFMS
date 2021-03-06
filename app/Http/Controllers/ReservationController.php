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
        $this->realtime();
        $reservations= \DB::table('reservations') ->select('reservations.primeID', 'reservations.eventStatus', 'reservations.status', 'reservationName', 'reservationDescription', 'reservationStart','reservationEnd', 'dateReserved', 'facilities.facilityName', 'residents.lastName','residents.firstName','residents.middleName') 
                                        ->join('facilities', 'reservations.facilityPrimeID', '=', 'facilities.primeID')
                                        ->join('residents', 'reservations.peoplePrimeID', '=', 'residents.residentPrimeID') 
                                        ->get();
        $nonres= \DB::table('reservations') ->select('reservations.primeID','reservations.status', 'reservations.eventStatus', 'reservationName', 'reservationDescription', 'reservationStart','reservationEnd', 'dateReserved', 'facilities.facilityName', 'name','age','email','contactNumber') 
                                        ->join('facilities', 'reservations.facilityPrimeID', '=', 'facilities.primeID')
                                        ->where('reservations.peoplePrimeID', '=', null) 
                                        ->get();
        return view('facility-reservation')->with('reservations',$reservations)->with('nonres',$nonres);
    }

    public function refresh(Request $r) {
        if ($r -> ajax()) {
            return json_encode(Reservation::select('reservations.primeID', 'reservations.reservationName', 
                                                    'reservations.reservationStart', 'reservations.reservationEnd', 
                                                    'reservations.dateReserved', 'reservations.status', 
                                                    'facilities.facilityName', 'residents.firstName', 
                                                    'residents.middleName', 'residents.lastName') 
                                        -> join('facilities', 'reservations.facilityPrimeID', '=', 'facilities.primeID')
                                        -> join('residents', 'reservations.peoplePrimeID', '=', 'residents.residentPrimeID') 
                                        -> get());
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

        //$reservationStartView = ;

        $insertRet = Reservation::insert(['reservationName'=>trim($r->name),
                                                'reservationDescription'=>trim($r->desc),
                                                'reservationStart'=>$r->startTime,
                                                'reservationEnd'=>$r->endTime,
                                                'dateReserved'=>$r->date,
                                                'peoplePrimeID'=>$r->peoplePrimeID,
                                                'eventStatus'=>'NYD', 
                                                'facilityPrimeID'=>$r->facilityPrimeID,
                                                'status'=>'Pending', 
                                                'eventStatus'=>'NYD']);

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
                'date' => 'required|date|after_or_equal:today'
        ]);

        $insertRet = Reservation::insert(['reservationName'=>trim($r->input('reservationName')),
                                                'reservationDescription'=>trim($r->input('desc')),
                                                'reservationStart'=>$r->input('startTime'),
                                                'reservationEnd'=>$r->input('endTime'),
                                                'dateReserved'=>$r->input('date'),
                                                'peoplePrimeID'=>$r->input('peoplePrimeID'),
                                                'facilityPrimeID'=>$r->input('facilityPrimeID'),
                                                'status'=>'Pending',
                                                'eventStatus'=>'NYD']);

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
                                                'eventStatus' => 'NYD', 
                                                'contactNumber'=>$r->input('contactNumber'),
                                                'facilityPrimeID'=>$r->input('facilityPrimeID'),
                                                'status'=>'Pending', 
                                                'eventStatus'=>'NYD']);
        
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
                                                'status'=>'Pending', 
                                                'eventStatus'=>'NYD']);

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

     

    public function extendTime(Request $r) {
        if($r -> ajax()) {
            $resDetails = Reservation::find($r -> input('primeID'));
            
            $collectOld = Collection::select('amount')
                            ->where("reservationPrimeID", $r->input('primeID'))
                            ->get();

            $resDetails -> reservationEnd = $r -> input('mysqlTime');
            $resDetails -> status = "Pending";
            $resDetails -> eventStatus = "Extended";
            $resDetails -> save();

            $totalAmount = 0;
            $hourDiff = 0;
            if (date('H', strtotime($resDetails -> reservationStart)) >= 10 && 
                date('H', strtotime($resDetails -> reservationStart)) < 18 && 
                date('H', strtotime($resDetails -> reservationEnd)) >= 10 && 
                date('H', strtotime($resDetails -> reservationEnd)) < 18) {
                $hourDiff = abs(strtotime($resDetails -> reservationStart) - strtotime($resDetails -> reservationEnd));
                $hourDiff /= 3600;
                
                $morningPrice = Facility::select('facilityDayPrice')
                                        -> where('primeID', '=', $resDetails -> facilityPrimeID)
                                        -> get();
                
                $totalAmount += $hourDiff * ($morningPrice[0] -> facilityDayPrice);
                
            } 
            else if (date('H', strtotime($resDetails -> reservationStart)) >= 18 && 
                        date('H', strtotime($resDetails -> reservationStart)) <= 22 && 
                        date('H', strtotime($resDetails -> reservationEnd)) >= 18 && 
                        date('H', strtotime($resDetails -> reservationEnd)) <= 22) {
                $hourDiff = abs(strtotime($resDetails -> reservationStart) - strtotime($resDetails -> reservationEnd));
                $hourDiff /= 3600;
    
                $eveningPrice = Facility::select('facilityNightPrice')
                                    -> where('primeID', '=', $resDetails->facilityPrimeID)
                                    -> get();
                
                $totalAmount += $hourDiff * ($eveningPrice[0] -> facilityNightPrice);
            }
            else {
                $startHour = abs(date('H', strtotime($resDetails -> reservationStart)) - 18);
                $endHour = abs(date('H', strtotime($resDetails -> reservationEnd)) - 17);
    
                $morningPrice = Facility::select('facilityDayPrice')
                                            -> where('primeID', '=', $resDetails->facilityPrimeID)
                                            -> get();
    
                $eveningPrice = Facility::select('facilityNightPrice')
                                    -> where('primeID', '=', $resDetails->facilityPrimeID)
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

            foreach($collectOld as $c)
            {
                $totalAmount = $totalAmount = $c-> amount;
            }

            if (is_null($resDetails -> peoplePrimeID)) {
                $collectionRet = Collection::insert(['collectionID' => $nextKey,
                                                        'collectionDate' => Carbon::now(), 
                                                        'collectionType' => 3, 
                                                        'amount' => $totalAmount, 
                                                        'status' => 'Pending', 
                                                        'reservationPrimeID' => $resDetails -> primeID, 
                                                        'peoplePrimeID' => $resDetails -> peoplePrimeID]);
            }
            else {
                $collectionRet = Collection::insert(['collectionID' => $nextKey,
                                                        'collectionDate' => Carbon::now(), 
                                                        'collectionType' => 3, 
                                                        'amount' => $totalAmount, 
                                                        'status' => 'Pending', 
                                                        'reservationPrimeID' => $resDetails -> primeID, 
                                                        'residentPrimeID' => $resDetails -> peoplePrimeID]);
            }
        } 
        else {
            return view('errors.403');
        }
    }

    public function checkReservation(Request $r) {
        if($r -> ajax()) {
            $resDetails = Reservation::find($r -> input('primeID'));

            $possibleRes = Reservation::where("facilityPrimeID", "=", $resDetails -> facilityPrimeID)
                                        -> whereDate("dateReserved", "=", $resDetails -> dateReserved)
                                        -> where("reservationStart", "<", $r -> input("mysqlTime"))
                                        -> where("reservationEnd", ">=", $r -> input("mysqlTime"))
                                        -> where("status", "=", "Paid") 
                                        -> where("primeID", "!=", $r -> input('primeID'))
                                        -> get();

            if ($possibleRes -> count()) {
               return "false";
            }
            
            $possibleRes = Reservation::where("facilityPrimeID", "=", $resDetails -> facilityPrimeID)
                                        -> whereDate("dateReserved", "=", $resDetails -> dateReserved)
                                        -> where("reservationStart", ">", $resDetails -> reservationStart)
                                        -> where("reservationEnd", "<=", $r -> input("mysqlTime"))
                                        -> where("status", "=", "Paid") 
                                        -> where("primeID", "!=", $r -> input('primeID'))
                                        -> get();

            if ($possibleRes -> count()) {
                return "false";
            }

            return "true";
        }
        else {
            return view('errors.403');
        }
    }

    public function getResDetails(Request $r) {
        if($r -> ajax()) {
            $resDetails = Reservation::where("primeID", "=", $r -> input('primeID')) -> get();
            return json_encode($resDetails);
        } 
        else {
            return view('errors.403');
        }
    }

    public function check(Request $r) {
        if($r -> ajax()) {
            $check = \DB::table('reservations') 
                        ->select('primeID','reservationName')
    			        ->where('dateReserved','=',$r->input('date'))
                        ->where('facilityPrimeID','=',$r->input('facilityPrimeID'))
                        ->where('status','!=','Rescheduled')
                        ->where('status','!=','Cancelled')
                        ->where(function($q)use($r){
                                $q->where('reservationStart', '<',$r->input('startTime'))
                                  ->where('reservationEnd', '>',$r->input('endTime'));
                            })
                        ->orWhere(function($q)use($r){
                                $q->where('reservationStart', '>',$r->input('startTime'))
                                  ->where('reservationEnd', '>',$r->input('endTime'))
                                  ->where('reservationStart', '<',$r->input('endTime'));
                            })
                        ->orWhere(function($q)use($r){
                                $q->where('reservationStart', '<',$r->input('startTime'))
                                  ->where('reservationEnd', '<',$r->input('endTime'))
                                  ->where('reservationEnd', '>',$r->input('startTime'));
                            })
                        ->orWhere(function($q)use($r){
                                $q->where('reservationStart', '>',$r->input('startTime'))
                                  ->where('reservationEnd', '<',$r->input('endTime'));
                            })
                        
                            
                        
                         -> get();
            return json_encode($check);
        } 
        else {
            return view('errors.403');
        }
    }

    public function checkR(Request $r) {
        if($r -> ajax()) {
            $check = \DB::table('reservations') 
                        ->select('primeID','reservationName')
    			        ->where('dateReserved','=',$r->input('date'))
                        ->where('facilityPrimeID','=',$r->input('facilityPrimeID'))
                        ->where('primeID','!=',$r->input('primeID'))
                        ->where('status','!=','Rescheduled')
                        ->where('status','!=','Cancelled')
                        ->where(function($q)use($r){
                                $q->where('reservationStart', '<',$r->input('startTime'))
                                  ->where('reservationEnd', '>',$r->input('endTime'));
                            })
                        ->orWhere(function($q)use($r){
                                $q->where('reservationStart', '>',$r->input('startTime'))
                                  ->where('reservationEnd', '>',$r->input('endTime'))
                                  ->where('reservationStart', '<',$r->input('endTime'));
                            })
                        ->orWhere(function($q)use($r){
                                $q->where('reservationStart', '<',$r->input('startTime'))
                                  ->where('reservationEnd', '<',$r->input('endTime'))
                                  ->where('reservationEnd', '>',$r->input('startTime'));
                            })
                        ->orWhere(function($q)use($r){
                                $q->where('reservationStart', '>',$r->input('startTime'))
                                  ->where('reservationEnd', '<',$r->input('endTime'));
                            })
                        
                            
                        
                         -> get();
            return json_encode($check);
        } 
        else {
            return view('errors.403');
        }
    }

    public function realtime() {
        // Change from NYD to OnGoing
        $ongoing = Reservation::where('eventStatus', 'NYD')
                                ->where('status', 'Paid')
                                ->get();
        
        foreach ($ongoing as $og) {
            echo "ONGOING: " . $og->reservationName . "\n";
            if (Carbon::now() >= $og -> reservationStart && 
                Carbon::now() < $og -> reservationEnd) {
                $og -> eventStatus = "OnGoing";
                $og -> save();
            }
        }

        // Change from NYD to Done
        $ongoing = Reservation::where('eventStatus', 'NYD')
                                ->where('status', 'Paid')
                                ->get();
        
        foreach ($ongoing as $og) {
            echo "ONGOING: " . $og->reservationName . "\n";
            if (Carbon::now() >= $og -> reservationStart && 
                Carbon::now() >= $og -> reservationEnd) {
                $og -> eventStatus = "Done";
                $og -> save();
            }
        }

        // Change from OnGoing to Done
        $done = Reservation::where('eventStatus', 'OnGoing')
                            ->where('status', 'Paid')
                            ->get();

        foreach ($done as $dn) {
            if (Carbon::now() >= $dn -> reservationEnd) {
                $dn -> eventStatus = "Done";
                $dn -> save();
            }
        }

        // Change from Extended to Done
        $extended = Reservation::where('eventStatus', 'Extended')
                                ->where('status', 'Paid')
                                ->get();
        
        foreach ($extended as $dn) {
            if (Carbon::now() >= $dn -> reservationEnd) {
                $dn -> eventStatus = "Done";
                $dn -> save();
            }
        }

        // Changed unpaid reservation to Cancelled
        $pending = Reservation::where('status', '=', 'Pending')
                                ->get();

        foreach ($pending as $pd) {
            if (Carbon::now() >= $pd -> reservationEnd) {
                $pd -> status = "Cancelled";
                $pd -> eventStatus = "Done";
            }
        }
    }
}
