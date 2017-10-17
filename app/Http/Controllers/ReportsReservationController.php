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
        
        

        $resR = Reservation::select('dateReserved','reservationStart','reservationEnd','reservationName',
                                    'residents.firstName','residents.middleName','residents.lastName','facilityName')
                            ->join('residents','reservations.peoplePrimeId','=','residents.residentPrimeID')
                            ->join('facilities','reservations.facilityPrimeId','=','facilities.primeID')
                            ->where('reservations.status', '=', 'Paid') 
                            ->where('reservations.eventStatus', '=', 'Done') 
                            ->orderBy('dateReserved','desc')
                            ->get();
        $total = 0;
        $fromDate = null;
        $toDate = null;


        return view('pdfreservation')
                        ->with('fromDate',$fromDate)
                        ->with('toDate',$toDate)    
                        ->with('resR',$resR)
                        ->with('total',$total);
    }

    public function previewRange($fromDate,$toDate) {
        
        $res = Resident::select('residents.residentPrimeID','imagePath','residentID', 'firstName',
                                'lastName','middleName','suffix', 'residents.status', 
                                'contactNumber', 'gender', 'birthDate',
                                'civilStatus','seniorCitizenID','disabilities', 'email',
                                'residentType', 'address','dateReg') 
                            ->where('residents.status', '=', 1) 
                            ->whereBetween('dateReg',[$fromDate,$toDate])
                            ->orderBy('dateReg','desc')
                            ->get();

        $avg = Resident::select('birthDate') 
                            ->where('residents.status', '=', 1) 
                            ->whereBetween('dateReg',[$fromDate,$toDate])
                            ->get();
        $sum = 0;
        $total = 0;
        $ave = 0;
        foreach($avg as $a)
        {
            $sum = $sum + 1;
            $total = $total + Carbon::parse($a->birthDate)->diffInYears(Carbon::now());     
        }

        $ave = $total/$sum;



        $totall = Resident::where('residents.status', '=', 1) 
                            ->whereBetween('dateReg',[$fromDate,$toDate])->count();

        $totalMale = Resident::where('residents.status', '=', 1) 
                            ->whereBetween('dateReg',[$fromDate,$toDate])
                            ->where('gender','=','M')
                            ->count();
        $totalFemale = Resident::where('residents.status', '=', 1) 
                            ->whereBetween('dateReg',[$fromDate,$toDate])
                            ->whereNotNull('seniorCitizenID')
                            ->where('gender','=','F')->count();

        

        return view('preview.resident')
                        ->with('fromDate',$fromDate)
                        ->with('toDate',$toDate)    
                        ->with('ave',$ave)
                        ->with('residents',$res)
                        ->with('total',$totall)
                        ->with('totalFemale',$totalFemale)
                        ->with('totalMale',$totalMale);

        

    }

    public function printAll(){

        $fromDate = null;
        $toDate = null;

        $residents = Resident::select('residents.residentPrimeID','imagePath','residentID', 'firstName',
                                'lastName','middleName','suffix', 'residents.status', 
                                'contactNumber', 'gender', 'birthDate',
                                'civilStatus','seniorCitizenID','disabilities', 'email',
                                'residentType', 'address','dateReg') 
                            ->where('residents.status', '=', 1) 
                            ->orderBy('dateReg','desc')
                            ->get();


        $total = Resident::count();
        $totalMale = Resident::where('gender','=','M')->count();
        $totalFemale = Resident::where('gender','=','F')->count();

        $avg = Resident::select('birthDate') 
                            ->where('residents.status', '=', 1) 
                            ->get();
        $sum = 0;
        $totals = 0;
        $ave = 0;

        foreach($avg as $a)
        {
            $sum = $sum + 1;
            $totals = $totals + Carbon::parse($a->birthDate)->diffInYears(Carbon::now());     
        }

        $ave = $totals/$sum;
            
        $pdf = PDF::loadView('pdfresident',compact('fromDate','toDate','ave','total','residents','totalMale','totalFemale'))
                        ->setPaper('a4','landscape')
                        ->setOptions(['defaultFont' => 'sans-serif']);
        
        
        return $pdf->download('Report-RegisteredResidents.pdf');

        return back();
    }


    public function printRange(Request $r){

        $residents = Resident::select('residents.residentPrimeID','imagePath','residentID', 'firstName',
                                'lastName','middleName','suffix', 'residents.status', 
                                'contactNumber', 'gender', 'birthDate',
                                'civilStatus','seniorCitizenID','disabilities', 'email',
                                'residentType', 'address','dateReg') 
                            ->where('residents.status', '=', 1) 
                            ->whereBetween('dateReg',[$r->input('fromDate'),$r->input('toDate')])
                            ->orderBy('dateReg','desc')
                            ->get();

        $avg = Resident::select('birthDate') 
                            ->where('residents.status', '=', 1) 
                            ->whereBetween('dateReg',[$r->input('fromDate'),$r->input('toDate')])
                            ->get();
        $sum = 0;
        $totals = 0;
        $ave = 0;
        foreach($avg as $a)
        {
            $sum = $sum + 1;
            $totals = $totals + Carbon::parse($a->birthDate)->diffInYears(Carbon::now());     
        }

        $ave = $totals/$sum;



        $total = Resident::where('residents.status', '=', 1) 
                            ->whereBetween('dateReg',[$r->input('fromDate'),$r->input('toDate')])->count();

        $totalMale = Resident::where('residents.status', '=', 1) 
                            ->whereBetween('dateReg',[$r->input('fromDate'),$r->input('toDate')])
                            ->where('gender','=','M')
                            ->count();
        $totalFemale = Resident::where('residents.status', '=', 1) 
                            ->whereBetween('dateReg',[$r->input('fromDate'),$r->input('toDate')])
                            ->where('gender','=','F')->count();

        $fromDate =  $r->input('fromDate');
        $toDate =  $r->input('toDate');


        $pdf = PDF::loadView('pdfresident',compact('fromDate','toDate','ave','total','residents','totalMale','totalFemale'))
                        ->setPaper('a4','landscape')
                        ->setOptions(['defaultFont' => 'sans-serif']);
        
        
        return $pdf->download('Report-RegisteredResidents.pdf');

        return back();
    }




}
