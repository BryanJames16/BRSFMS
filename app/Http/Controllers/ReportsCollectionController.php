<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Collection;
use Carbon\Carbon;
use PDF;

class ReportsCollectionController extends Controller
{
    public function index() {
        return view('report-collection');
    }

    public function previewAll() {
        
        $fromDate = null;
        $toDate = null;
        $total = 0;
        $totalCollections = 0;
        $totalCollectionID = 0;
        $totalCollectionDocu = 0;
        $totalCollectionReservation = 0;

        $reserveRes = Collection::select('collections.collectionPrimeID', 
                                            'collections.collectionID', 
                                            'collections.collectionType', 
                                            'collections.amount', 
                                            'collections.status', 
                                            'collections.paymentDate', 
                                            'residents.firstName', 
                                            'residents.middleName', 
                                            'residents.lastName', 
                                            'residents.residentID', 
                                            'reservations.reservationName', 
                                            'residents.residentPrimeID')
                        -> join('reservations', 
                                    'collections.reservationPrimeID', '=', 'reservations.primeID') 
                        -> join('residents', 
                                    'collections.residentPrimeID', '=', 'residents.residentPrimeID') 
                        -> where('collections.status','=','Paid')
                        -> get();

        foreach($reserveRes as $rr)
        {
            $totalCollectionReservation += $rr->amount;
        }
        
        $totalR = Collection::join('reservations', 
                                    'collections.reservationPrimeID', '=', 'reservations.primeID') 
                        -> join('residents', 
                                    'collections.residentPrimeID', '=', 'residents.residentPrimeID') 
                        -> where('collections.status','=','Paid')
                        -> count();

        $collectionID = Collection::select('collections.collectionPrimeID', 
                                            'collections.collectionID', 
                                            'collections.collectionType', 
                                            'collections.collectionDate', 
                                            'collections.amount', 
                                            'collections.status', 
                                            'residents.firstName', 
                                            'residents.middleName', 
                                            'residents.lastName', 
                                            'residents.residentID', 
                                            'residents.residentPrimeID')
                        -> join('barangaycard', 
                                    'collections.cardID', '=', 'barangaycard.cardID') 
                        -> join('residents', 
                                    'barangaycard.rID', '=', 'residents.residentPrimeID')             
                        -> where('collections.status','Paid')
                        -> get();

        foreach($collectionID as $ci)
        {
            $totalCollectionID += $ci->amount;
        }

        
        $totalI = Collection::join('barangaycard', 
                                    'collections.cardID', '=', 'barangaycard.cardID') 
                        -> join('residents', 
                                    'barangaycard.rID', '=', 'residents.residentPrimeID')             
                        -> where('collections.status','Paid')
                        -> count();

        $total = $totalI + $totalR;
        $totalCollections = $totalCollectionID + $totalCollectionDocu + $totalCollectionReservation;

        

        return view('preview.collection')    
                        ->with('fromDate',$fromDate)
                        ->with('toDate',$toDate)
                        ->with('total',$total)
                        ->with('totalCollections',$totalCollections)
                        ->with('totalCollectionID',$totalCollectionID)
                        ->with('totalCollectionDocu',$totalCollectionDocu)
                        ->with('totalCollectionReservation',$totalCollectionReservation)
                        ->with('reserveRes',$reserveRes)
                        ->with('collectionID',$collectionID);
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
