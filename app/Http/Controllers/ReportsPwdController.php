<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Resident;
use Carbon\Carbon;

class ReportsPwdController extends Controller
{
    public function index() {
        return view('report-pwd');
    }

    public function generateRange($fromDate,$toDate) {
        
        $res = Resident::select('residents.residentPrimeID','imagePath','residentID', 'firstName',
                                'lastName','middleName','suffix', 'residents.status', 
                                'contactNumber', 'gender', 'birthDate',
                                'civilStatus','seniorCitizenID','disabilities', 'email',
                                'residentType', 'address') 
                            ->where('residents.status', '=', 1) 
                            ->whereBetween('dateReg',[$fromDate,$toDate])
                            ->whereNotNull('disabilities')
                            ->get();

        $avg = Resident::select('birthDate') 
                            ->where('residents.status', '=', 1) 
                            ->whereBetween('dateReg',[$fromDate,$toDate])
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



        $totall = Resident::select('residents.residentPrimeID','imagePath','residentID', 'firstName',
                                'lastName','middleName','suffix', 'residents.status', 
                                'contactNumber', 'gender', 'birthDate',
                                'civilStatus','seniorCitizenID','disabilities', 'email',
                                'residentType', 'address') 
                            ->where('residents.status', '=', 1) 
                            ->whereBetween('dateReg',[$fromDate,$toDate])
                            ->whereNotNull('disabilities')->count();

        $totalMale = Resident::select('residents.residentPrimeID','imagePath','residentID', 'firstName',
                                'lastName','middleName','suffix', 'residents.status', 
                                'contactNumber', 'gender', 'birthDate',
                                'civilStatus','seniorCitizenID','disabilities', 'email',
                                'residentType', 'address') 
                            ->where('residents.status', '=', 1) 
                            ->whereBetween('dateReg',[$fromDate,$toDate])
                            ->whereNotNull('disabilities')
                            ->where('gender','=','M')
                            ->count();
        $totalFemale = Resident::select('residents.residentPrimeID','imagePath','residentID', 'firstName',
                                'lastName','middleName','suffix', 'residents.status', 
                                'contactNumber', 'gender', 'birthDate',
                                'civilStatus','seniorCitizenID','disabilities', 'email',
                                'residentType', 'address') 
                            ->where('residents.status', '=', 1) 
                            ->whereBetween('dateReg',[$fromDate,$toDate])
                            ->whereNotNull('disabilities')
                            ->where('gender','=','F')->count();

        

        return view('preview.pwd')
                        ->with('fromDate',$fromDate)
                        ->with('toDate',$toDate)
                        ->with('ave',$ave)
                        ->with('residents',$res)
                        ->with('total',$totall)
                        ->with('totalFemale',$totalFemale)
                        ->with('totalMale',$totalMale);

        

    }

    


}
