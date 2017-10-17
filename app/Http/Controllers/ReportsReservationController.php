<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Resident;
use \App\Models\Reservation;
use \App\Models\Businessregistration;
use Carbon\Carbon;
use PDF;

class ReportsReservationController extends Controller
{
    public function index() {
        return view('report-reservation');
    }

    public function previewAll() {
        
        $total = 0;
        $totalR = 0;
        $totalN = 0;
        $fromDate = null;
        $toDate = null;

        $resR = Reservation::select('dateReserved','reservationStart','reservationEnd','reservationName',
                                    'residents.firstName','residents.middleName','residents.lastName','facilityName')
                            ->join('residents','reservations.peoplePrimeId','=','residents.residentPrimeID')
                            ->join('facilities','reservations.facilityPrimeId','=','facilities.primeID')
                            ->where('reservations.status', '=', 'Paid') 
                            ->where('reservations.eventStatus', '=', 'Done') 
                            ->orderBy('dateReserved','desc')
                            ->get();

        $resN = Reservation::select('dateReserved','reservationStart','reservationEnd','reservationName',
                                    'name','facilityName')
                            ->join('facilities','reservations.facilityPrimeId','=','facilities.primeID')
                            ->where('reservations.status', '=', 'Paid') 
                            ->where('peoplePrimeID',null)
                            ->where('reservations.eventStatus', '=', 'Done') 
                            ->orderBy('dateReserved','desc')
                            ->get();

        foreach($resR as $r)
        {
            $total += 1;
            $totalR += 1;
        }
        foreach($resN as $r)
        {
            $total += 1;
            $totalN += 1;
        }

        


        return view('preview.reservation')
                        ->with('fromDate',$fromDate)
                        ->with('toDate',$toDate)    
                        ->with('resR',$resR)
                        ->with('resN',$resN)
                        ->with('total',$total)
                        ->with('totalR',$totalR)
                        ->with('totalN',$totalN);
    }

    public function previewRange($fromDate,$toDate) {
        
        $total = 0;
        $totalR = 0;
        $totalN = 0;

        $resR = Reservation::select('dateReserved','reservationStart','reservationEnd','reservationName',
                                    'residents.firstName','residents.middleName','residents.lastName','facilityName')
                            ->join('residents','reservations.peoplePrimeId','=','residents.residentPrimeID')
                            ->join('facilities','reservations.facilityPrimeId','=','facilities.primeID')
                            ->whereBetween('dateReserved',[$fromDate,$toDate])
                            ->where('reservations.status', '=', 'Paid') 
                            ->where('reservations.eventStatus', '=', 'Done') 
                            ->orderBy('dateReserved','desc')
                            ->get();

        $resN = Reservation::select('dateReserved','reservationStart','reservationEnd','reservationName',
                                    'name','facilityName')
                            ->join('facilities','reservations.facilityPrimeId','=','facilities.primeID')
                            ->where('reservations.status', '=', 'Paid') 
                            ->whereBetween('dateReserved',[$fromDate,$toDate])
                            ->where('peoplePrimeID',null)
                            ->where('reservations.eventStatus', '=', 'Done') 
                            ->orderBy('dateReserved','desc')
                            ->get();

        foreach($resR as $r)
        {
            $total += 1;
            $totalR += 1;
        }
        foreach($resN as $r)
        {
            $total += 1;
            $totalN += 1;
        }

        


        return view('preview.reservation')
                        ->with('fromDate',$fromDate)
                        ->with('toDate',$toDate)    
                        ->with('resR',$resR)
                        ->with('resN',$resN)
                        ->with('total',$total)
                        ->with('totalR',$totalR)
                        ->with('totalN',$totalN);

        

    }

    public function printAll(){

        $total = 0;
        $totalR = 0;
        $totalN = 0;
        $fromDate = null;
        $toDate = null;

        $resR = Reservation::select('dateReserved','reservationStart','reservationEnd','reservationName',
                                    'residents.firstName','residents.middleName','residents.lastName','facilityName')
                            ->join('residents','reservations.peoplePrimeId','=','residents.residentPrimeID')
                            ->join('facilities','reservations.facilityPrimeId','=','facilities.primeID')
                            ->where('reservations.status', '=', 'Paid') 
                            ->where('reservations.eventStatus', '=', 'Done') 
                            ->orderBy('dateReserved','desc')
                            ->get();

        $resN = Reservation::select('dateReserved','reservationStart','reservationEnd','reservationName',
                                    'name','facilityName')
                            ->join('facilities','reservations.facilityPrimeId','=','facilities.primeID')
                            ->where('reservations.status', '=', 'Paid') 
                            ->where('peoplePrimeID',null)
                            ->where('reservations.eventStatus', '=', 'Done') 
                            ->orderBy('dateReserved','desc')
                            ->get();

        foreach($resR as $r)
        {
            $total += 1;
            $totalR += 1;
        }
        foreach($resN as $r)
        {
            $total += 1;
            $totalN += 1;
        }
            
        $pdf = PDF::loadView('pdfreservation',compact('fromDate','toDate','total','totalR','totalN','resR','resN'))
                        ->setPaper('a4','landscape')
                        ->setOptions(['defaultFont' => 'sans-serif']);
        
        
        return $pdf->download('Report-ReservedFacilities.pdf');

        return back();
    }


    public function printRange(Request $r){

        $total = 0;
        $totalR = 0;
        $totalN = 0;
        $fromDate = $r->input('fromDate');
        $toDate = $r->input('toDate');

        $resR = Reservation::select('dateReserved','reservationStart','reservationEnd','reservationName',
                                    'residents.firstName','residents.middleName','residents.lastName','facilityName')
                            ->join('residents','reservations.peoplePrimeId','=','residents.residentPrimeID')
                            ->join('facilities','reservations.facilityPrimeId','=','facilities.primeID')
                            ->where('reservations.status', '=', 'Paid') 
                            ->whereBetween('dateReserved',[$fromDate,$toDate])
                            ->where('reservations.eventStatus', '=', 'Done') 
                            ->orderBy('dateReserved','desc')
                            ->get();

        $resN = Reservation::select('dateReserved','reservationStart','reservationEnd','reservationName',
                                    'name','facilityName')
                            ->join('facilities','reservations.facilityPrimeId','=','facilities.primeID')
                            ->where('reservations.status', '=', 'Paid') 
                            ->whereBetween('dateReserved',[$fromDate,$toDate])
                            ->where('peoplePrimeID',null)
                            ->where('reservations.eventStatus', '=', 'Done') 
                            ->orderBy('dateReserved','desc')
                            ->get();

        foreach($resR as $r)
        {
            $total += 1;
            $totalR += 1;
        }
        foreach($resN as $r)
        {
            $total += 1;
            $totalN += 1;
        }
            
        $pdf = PDF::loadView('pdfreservation',compact('fromDate','toDate','total','totalR','totalN','resR','resN'))
                        ->setPaper('a4','landscape')
                        ->setOptions(['defaultFont' => 'sans-serif']);
        
        
        return $pdf->download('Report-ReservedFacilities.pdf');

        return back();

    }




}
