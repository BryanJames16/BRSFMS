<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Resident;
use \App\Models\Residentbackground;
use Carbon\Carbon;
use PDF;

class ReportsEmployedController extends Controller
{
    public function index() {
        return view('report-employed');
    }

    public function previewAll() {
        $residents = Resident::select('residents.residentPrimeID','imagePath','residentID', 'firstName',
                                'lastName','middleName','suffix', 'residents.status', 
                                'contactNumber', 'gender', 'birthDate',
                                'civilStatus','seniorCitizenID','disabilities', 'email',
                                'residentType', 'address','currentWork','backgroundPrimeID','monthlyIncome') 
                            ->join('residentbackgrounds','residents.residentPrimeID','=','residentbackgrounds.peoplePrimeID')
                            ->where('residents.status', '=', 1) 
                            ->where('currentWork','!=','None')
                            ->get();
        
        $totalResident = Resident::where('residents.status', '=', 1) 
                            ->count();
        

        $total = 0;
        $totalUnemployed = 0;
        $totalMale = 0;
        $totalFemale = 0;
        $fromDate = null;
        $toDate = null;
        
        $work = Residentbackground::select('peoplePrimeID',\DB::raw('max(dateStarted) as ma'),\DB::raw('max(backgroundPrimeID) as bs'))
                                ->where('currentWork','!=','None')
                                ->groupBy('peoplePrimeID')
                                ->get();


        foreach($residents as $r)
        {
            foreach($work as $w)
            {
                if($r->backgroundPrimeID == $w->bs)
                {
                    $total += 1;
                    if($r->gender == 'M')
                    {
                        $totalMale += 1;
                    }
                    else{
                        $totalFemale += 1;
                    }
                }
            }
        }
                                
        $totalUnemployed = $totalResident - $total;

        return view('preview.employed')
                        ->with('fromDate',$fromDate)
                        ->with('toDate',$toDate)    
                        ->with('residents',$residents)
                        ->with('total',$total)
                        ->with('work',$work)
                        ->with('totalUnemployed',$totalUnemployed)
                        ->with('totalFemale',$totalFemale)
                        ->with('totalMale',$totalMale);
    }

    public function previewRange($fromDate,$toDate) {
        


        $residents = Resident::select('residents.residentPrimeID','imagePath','residentID', 'firstName',
                                'lastName','middleName','suffix', 'residents.status', 
                                'contactNumber', 'gender', 'birthDate',
                                'civilStatus','seniorCitizenID','disabilities', 'email',
                                'residentType', 'address','currentWork','backgroundPrimeID','monthlyIncome') 
                            ->join('residentbackgrounds','residents.residentPrimeID','=','residentbackgrounds.peoplePrimeID')
                            ->where('residents.status', '=', 1) 
                            ->whereBetween('dateReg',[$fromDate,$toDate])
                            ->where('currentWork','!=','None')
                            ->get();
        
        $totalResident = Resident::where('residents.status', '=', 1)
                                    ->whereBetween('dateReg',[$fromDate,$toDate]) 
                                    ->count();
        

        $total = 0;
        $totalUnemployed = 0;
        $totalMale = 0;
        $totalFemale = 0;
        
        $work = Residentbackground::select('peoplePrimeID',\DB::raw('max(dateStarted) as ma'),\DB::raw('max(backgroundPrimeID) as bs'))
                                ->where('currentWork','!=','None')
                                ->groupBy('peoplePrimeID')
                                ->get();


        foreach($residents as $r)
        {
            foreach($work as $w)
            {
                if($r->backgroundPrimeID == $w->bs)
                {
                    $total += 1;
                    if($r->gender == 'M')
                    {
                        $totalMale += 1;
                    }
                    else{
                        $totalFemale += 1;
                    }
                }
            }
        }
                                
        $totalUnemployed = $totalResident - $total;

        return view('preview.employed')
                        ->with('fromDate',$fromDate)
                        ->with('toDate',$toDate)    
                        ->with('residents',$residents)
                        ->with('total',$total)
                        ->with('work',$work)
                        ->with('totalUnemployed',$totalUnemployed)
                        ->with('totalFemale',$totalFemale)
                        ->with('totalMale',$totalMale);
        

    }

    public function printAll(){

        $residents = Resident::select('residents.residentPrimeID','imagePath','residentID', 'firstName',
                                'lastName','middleName','suffix', 'residents.status', 
                                'contactNumber', 'gender', 'birthDate',
                                'civilStatus','seniorCitizenID','disabilities', 'email',
                                'residentType', 'address','currentWork','backgroundPrimeID','monthlyIncome') 
                            ->join('residentbackgrounds','residents.residentPrimeID','=','residentbackgrounds.peoplePrimeID')
                            ->where('residents.status', '=', 1) 
                            ->where('currentWork','!=','None')
                            ->get();
        
        $totalResident = Resident::where('residents.status', '=', 1) 
                            ->count();
        

        $total = 0;
        $totalUnemployed = 0;
        $totalMale = 0;
        $totalFemale = 0;
        $fromDate = null;
        $toDate = null;
        
        $work = Residentbackground::select('peoplePrimeID',\DB::raw('max(dateStarted) as ma'),\DB::raw('max(backgroundPrimeID) as bs'))
                                ->where('currentWork','!=','None')
                                ->groupBy('peoplePrimeID')
                                ->get();


        foreach($residents as $r)
        {
            foreach($work as $w)
            {
                if($r->backgroundPrimeID == $w->bs)
                {
                    $total += 1;
                    if($r->gender == 'M')
                    {
                        $totalMale += 1;
                    }
                    else{
                        $totalFemale += 1;
                    }
                }
            }
        }
                                
        $totalUnemployed = $totalResident - $total;
            
        $pdf = PDF::loadView('pdfemployed',compact('totalUnemployed','fromDate','toDate','residents','total','work','totalMale','totalFemale'))
                        ->setPaper('a4','landscape')
                        ->setOptions(['defaultFont' => 'sans-serif']);
        
        
        return $pdf->download('Report-EmployedResidents.pdf');

        return back();
    }


    public function printRange(Request $r){

        $fromDate = $r->input('fromDate');
        $toDate = $r->input('toDate');

        $residents = Resident::select('residents.residentPrimeID','imagePath','residentID', 'firstName',
                                'lastName','middleName','suffix', 'residents.status', 
                                'contactNumber', 'gender', 'birthDate',
                                'civilStatus','seniorCitizenID','disabilities', 'email',
                                'residentType', 'address','currentWork','backgroundPrimeID','monthlyIncome') 
                            ->join('residentbackgrounds','residents.residentPrimeID','=','residentbackgrounds.peoplePrimeID')
                            ->where('residents.status', '=', 1) 
                            ->whereBetween('dateReg',[$fromDate,$toDate])
                            ->where('currentWork','!=','None')
                            ->get();
        
        $totalResident = Resident::where('residents.status', '=', 1)
                                    ->whereBetween('dateReg',[$fromDate,$toDate]) 
                                    ->count();
        

        $total = 0;
        $totalUnemployed = 0;
        $totalMale = 0;
        $totalFemale = 0;
        
        $work = Residentbackground::select('peoplePrimeID',\DB::raw('max(dateStarted) as ma'),\DB::raw('max(backgroundPrimeID) as bs'))
                                ->where('currentWork','!=','None')
                                ->groupBy('peoplePrimeID')
                                ->get();


        foreach($residents as $r)
        {
            foreach($work as $w)
            {
                if($r->backgroundPrimeID == $w->bs)
                {
                    $total += 1;
                    if($r->gender == 'M')
                    {
                        $totalMale += 1;
                    }
                    else{
                        $totalFemale += 1;
                    }
                }
            }
        }
                                
        $totalUnemployed = $totalResident - $total;


        $pdf = PDF::loadView('pdfemployed',compact('totalUnemployed','fromDate','toDate','residents','total','work','totalMale','totalFemale'))
                        ->setPaper('a4','landscape')
                        ->setOptions(['defaultFont' => 'sans-serif']);
        
        
        return $pdf->download('Report-EmployedResidents.pdf');

        return back();

    }


}
