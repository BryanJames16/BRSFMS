<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Resident;
use Carbon\Carbon;
use PDF;

class ReportsSeniorController extends Controller
{
    public function index() {
        return view('report-senior');
    }

    public function previewAll() {
        $res = Resident::select('residents.residentPrimeID','imagePath','residentID', 'firstName',
                                'lastName','middleName','suffix', 'residents.status', 
                                'contactNumber', 'gender', 'birthDate',
                                'civilStatus','seniorCitizenID','disabilities', 'email',
                                'residentType', 'address') 
                            ->where('residents.status', '=', 1) 
                            ->whereNotNull('seniorCitizenID')
                            ->get();

        $totall = Resident::where("seniorCitizenID", "!=", null)->count();
        $totalMale = Resident::where("seniorCitizenID", "!=", null)->where('gender','=','M')->count();
        $totalFemale = Resident::where("seniorCitizenID", "!=", null)->where('gender','=','F')->count();

        $avg = Resident::select('birthDate') 
                            ->where('residents.status', '=', 1) 
                            ->whereNotNull('seniorCitizenID')
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


        return view('preview.senior')
                        ->with('fromDate',$fromDate)
                        ->with('toDate',$toDate)    
                        ->with('residents',$res)
                        ->with('total',$totall)
                        ->with('ave',$ave)
                        ->with('totalFemale',$totalFemale)
                        ->with('totalMale',$totalMale);;
    }

    public function previewRange($fromDate,$toDate) {
        
        $res = Resident::select('residents.residentPrimeID','imagePath','residentID', 'firstName',
                                'lastName','middleName','suffix', 'residents.status', 
                                'contactNumber', 'gender', 'birthDate',
                                'civilStatus','seniorCitizenID','disabilities', 'email',
                                'residentType', 'address') 
                            ->where('residents.status', '=', 1) 
                            ->whereBetween('dateReg',[$fromDate,$toDate])
                            ->whereNotNull('seniorCitizenID')
                            ->get();

        $avg = Resident::select('birthDate') 
                            ->where('residents.status', '=', 1) 
                            ->whereBetween('dateReg',[$fromDate,$toDate])
                            ->whereNotNull('seniorCitizenID')
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



        $totall = Resident::select('residents.residentPrimeID','imagePath','residentID', 'firstName',
                                'lastName','middleName','suffix', 'residents.status', 
                                'contactNumber', 'gender', 'birthDate',
                                'civilStatus','seniorCitizenID','disabilities', 'email',
                                'residentType', 'address') 
                            ->where('residents.status', '=', 1) 
                            ->whereBetween('dateReg',[$fromDate,$toDate])
                            ->whereNotNull('seniorCitizenID')->count();

        $totalMale = Resident::select('residents.residentPrimeID','imagePath','residentID', 'firstName',
                                'lastName','middleName','suffix', 'residents.status', 
                                'contactNumber', 'gender', 'birthDate',
                                'civilStatus','seniorCitizenID','disabilities', 'email',
                                'residentType', 'address') 
                            ->where('residents.status', '=', 1) 
                            ->whereBetween('dateReg',[$fromDate,$toDate])
                            ->whereNotNull('seniorCitizenID')
                            ->where('gender','=','M')
                            ->count();
        $totalFemale = Resident::select('residents.residentPrimeID','imagePath','residentID', 'firstName',
                                'lastName','middleName','suffix', 'residents.status', 
                                'contactNumber', 'gender', 'birthDate',
                                'civilStatus','seniorCitizenID','disabilities', 'email',
                                'residentType', 'address') 
                            ->where('residents.status', '=', 1) 
                            ->whereBetween('dateReg',[$fromDate,$toDate])
                            ->whereNotNull('seniorCitizenID')
                            ->where('gender','=','F')->count();

        

        return view('preview.senior')
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
                                'residentType', 'address') 
                            ->where('residents.status', '=', 1) 
                            ->whereNotNull('seniorCitizenID')
                            ->get();


        $total = Resident::where("disabilities", "!=", null)->count();
        $totalMale = Resident::where("disabilities", "!=", null)->where('gender','=','M')->count();
        $totalFemale = Resident::where("disabilities", "!=", null)->where('gender','=','F')->count();

        $avg = Resident::select('birthDate') 
                            ->where('residents.status', '=', 1) 
                            ->whereNotNull('seniorCitizenID')
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
            
        $pdf = PDF::loadView('pdfsenior',compact('fromDate','toDate','ave','total','residents','totalMale','totalFemale'))
                        ->setPaper('a4','landscape')
                        ->setOptions(['defaultFont' => 'sans-serif']);
        
        
        return $pdf->download('Report-SeniorCitizen.pdf');

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
                            ->whereNotNull('seniorCitizenID')
                            ->get();

        $avg = Resident::select('birthDate') 
                            ->where('residents.status', '=', 1) 
                            ->whereBetween('dateReg',[$r->input('fromDate'),$r->input('toDate')])
                            ->whereNotNull('seniorCitizenID')
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
                            ->whereNotNull('seniorCitizenID')->count();

        $totalMale = Resident::select('residents.residentPrimeID','imagePath','residentID', 'firstName',
                                'lastName','middleName','suffix', 'residents.status', 
                                'contactNumber', 'gender', 'birthDate',
                                'civilStatus','seniorCitizenID','disabilities', 'email',
                                'residentType', 'address') 
                            ->where('residents.status', '=', 1) 
                            ->whereBetween('dateReg',[$r->input('fromDate'),$r->input('toDate')])
                            ->whereNotNull('seniorCitizenID')
                            ->where('gender','=','M')
                            ->count();
        $totalFemale = Resident::select('residents.residentPrimeID','imagePath','residentID', 'firstName',
                                'lastName','middleName','suffix', 'residents.status', 
                                'contactNumber', 'gender', 'birthDate',
                                'civilStatus','seniorCitizenID','disabilities', 'email',
                                'residentType', 'address') 
                            ->where('residents.status', '=', 1) 
                            ->whereBetween('dateReg',[$r->input('fromDate'),$r->input('toDate')])
                            ->whereNotNull('seniorCitizenID')
                            ->where('gender','=','F')->count();

        $fromDate =  $r->input('fromDate');
        $toDate =  $r->input('toDate');


        $pdf = PDF::loadView('pdfsenior',compact('fromDate','toDate','ave','total','residents','totalMale','totalFemale'))
                        ->setPaper('a4','landscape')
                        ->setOptions(['defaultFont' => 'sans-serif']);
        
        
        return $pdf->download('Report-SeniorCitizen.pdf');

        return back();
    }




}
