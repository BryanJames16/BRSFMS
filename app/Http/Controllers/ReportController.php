<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Resident;
use \App\Models\Lot;
use \App\Models\Businesscategory;
use \App\Models\Unit;
use \App\Models\Street;
use \App\Models\Family;
use \App\Models\Utility;
use \App\Models\Generaladdress;
use \App\Models\Familymember;
use \App\Models\Residentbackground;
use Carbon\Carbon;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;

require_once(app_path() . '/Includes/pktool.php');

use StaticCounter;
use SmartMove;

class ReportController extends Controller
{

    

    public function index() {
    	
        
    
        $res = Resident::select('residents.residentPrimeID','imagePath','residentID', 'firstName',
                                'lastName','middleName','suffix', 'residents.status', 
                                'contactNumber', 'gender', 'birthDate',
                                'civilStatus','seniorCitizenID','disabilities', 'email',
                                'residentType', 'address') 
                            ->where('residents.status', '=', 1) 
                            ->whereNotNull('disabilities')
                            ->get();

        $totall = Resident::where("disabilities", "!=", null)->count();
        $totalMale = Resident::where("disabilities", "!=", null)->where('gender','=','M')->count();
        $totalFemale = Resident::where("disabilities", "!=", null)->where('gender','=','F')->count();

        $avg = Resident::select('birthDate') 
                            ->where('residents.status', '=', 1) 
                            ->whereNotNull('disabilities')
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
        

        return view('pwdreport')
                        ->with('residents',$res)
                        ->with('total',$totall)
                        ->with('ave',$ave)
                        ->with('totalFemale',$totalFemale)
                        ->with('totalMale',$totalMale);

    }

    public function generate(){

        $residents = Resident::select('residents.residentPrimeID','imagePath','residentID', 'firstName',
                                'lastName','middleName','suffix', 'residents.status', 
                                'contactNumber', 'gender', 'birthDate',
                                'civilStatus','seniorCitizenID','disabilities', 'email',
                                'residentType', 'address') 
                            ->where('residents.status', '=', 1) 
                            ->whereNotNull('disabilities')
                            ->get();

        $total = Resident::where("disabilities", "!=", null)->count();
        $totalMale = Resident::where("disabilities", "!=", null)->where('gender','=','M')->count();
        $totalFemale = Resident::where("disabilities", "!=", null)->where('gender','=','F')->count();

        $avg = Resident::select('birthDate') 
                            ->where('residents.status', '=', 1) 
                            ->whereNotNull('disabilities')
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
            
        $pdf = PDF::loadView('pwdreport',compact('ave','total','residents','totalMale','totalFemale'))
                        ->setPaper('a4','landscape')
                        ->setOptions(['defaultFont' => 'sans-serif']);
        
        
        return $pdf->download('pwdreport.pdf');

        return back();
    }


    public function printRange(Request $r){

        $residents = Resident::select('residents.residentPrimeID','imagePath','residentID', 'firstName',
                                'lastName','middleName','suffix', 'residents.status', 
                                'contactNumber', 'gender', 'birthDate',
                                'civilStatus','seniorCitizenID','disabilities', 'email',
                                'residentType', 'address') 
                            ->where('residents.status', '=', 1) 
                            ->whereBetween('dateReg',[$r->input('fromDate'),$r->input('toDate')])
                            ->whereNotNull('disabilities')
                            ->get();

        $avg = Resident::select('birthDate') 
                            ->where('residents.status', '=', 1) 
                            ->whereBetween('dateReg',[$r->input('fromDate'),$r->input('toDate')])
                            ->whereNotNull('disabilities')
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



        $total = Resident::select('residents.residentPrimeID','imagePath','residentID', 'firstName',
                                'lastName','middleName','suffix', 'residents.status', 
                                'contactNumber', 'gender', 'birthDate',
                                'civilStatus','seniorCitizenID','disabilities', 'email',
                                'residentType', 'address') 
                            ->where('residents.status', '=', 1) 
                            ->whereBetween('dateReg',[$r->input('fromDate'),$r->input('toDate')])
                            ->whereNotNull('disabilities')->count();

        $totalMale = Resident::select('residents.residentPrimeID','imagePath','residentID', 'firstName',
                                'lastName','middleName','suffix', 'residents.status', 
                                'contactNumber', 'gender', 'birthDate',
                                'civilStatus','seniorCitizenID','disabilities', 'email',
                                'residentType', 'address') 
                            ->where('residents.status', '=', 1) 
                            ->whereBetween('dateReg',[$r->input('fromDate'),$r->input('toDate')])
                            ->whereNotNull('disabilities')
                            ->where('gender','=','M')
                            ->count();
        $totalFemale = Resident::select('residents.residentPrimeID','imagePath','residentID', 'firstName',
                                'lastName','middleName','suffix', 'residents.status', 
                                'contactNumber', 'gender', 'birthDate',
                                'civilStatus','seniorCitizenID','disabilities', 'email',
                                'residentType', 'address') 
                            ->where('residents.status', '=', 1) 
                            ->whereBetween('dateReg',[$r->input('fromDate'),$r->input('toDate')])
                            ->whereNotNull('disabilities')
                            ->where('gender','=','F')->count();
            
        $pdf = PDF::loadView('pwdreport',compact('ave','total','residents','totalMale','totalFemale'))
                        ->setPaper('a4','landscape')
                        ->setOptions(['defaultFont' => 'sans-serif']);
        
        
        return $pdf->download('pwdreport.pdf');

        return back();
    }

    
  
}

