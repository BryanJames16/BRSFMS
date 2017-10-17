<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Resident;
use \App\Models\Businessregistration;
use Carbon\Carbon;
use PDF;

class ReportsResidentController extends Controller
{
    public function index() {
        return view('report-resident');
    }

    public function previewAll() {
        
        $regs = Businessregistration::select('registrationPrimeID', 'businessID','originalName','tradeName', 'residents.residentPrimeID', 
                                                'registrationDate','businessregistrations.address', 'categoryID','categoryName','residents.lastName',
                                                'residents.firstName', 'residents.middleName','removalDate')
                                                    ->join('businesscategories', 'businessregistrations.categoryID', '=', 'businesscategories.categoryPrimeID')
                                                    ->join('residents', 'businessregistrations.residentPrimeID', '=', 'residents.residentPrimeID')
                                                    -> where('businessregistrations.archive', '=', 0)
                                                    ->where('registrationPrimeID','13')
                                                    -> get();  

        $res = Resident::select('residents.residentPrimeID','imagePath','residentID', 'firstName',
                                'lastName','middleName','suffix', 'residents.status', 
                                'contactNumber', 'gender', 'birthDate',
                                'civilStatus','seniorCitizenID','disabilities', 'email',
                                'residentType', 'address', 'dateReg') 
                            ->where('residents.status', '=', 1) 
                            ->orderBy('dateReg','desc')
                            ->get();

        $totall = Resident::count();
        $totalMale = Resident::where('gender','=','M')->count();
        $totalFemale = Resident::where('gender','=','F')->count();

        $avg = Resident::select('birthDate') 
                            ->where('residents.status', '=', 1) 
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
        $fromDate = null;
        $toDate = null;


        return view('preview.permit')
                        ->with('fromDate',$fromDate)
                        ->with('toDate',$toDate)    
                        ->with('residents',$res)
                        ->with('total',$totall)
                        ->with('ave',$ave)
                        ->with('regs',$regs)
                        ->with('totalFemale',$totalFemale)
                        ->with('totalMale',$totalMale);;
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
