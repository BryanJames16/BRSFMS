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

        $total = Resident::where("disabilities", "!=", null)->count();
        //$totalAvg = Resident::where("disabilities", "!=", null)
           //             ->avg(Carbon::parse('birthDate')->diffInYears(Carbon::now()));
        $totalMale = Resident::where("disabilities", "!=", null)->where('gender','=','M')->count();
        $totalFemale = Resident::where("disabilities", "!=", null)->where('gender','=','F')->count();


        return view('pwdreport')
                        ->with('residents',$res)
                        ->with('total',$total)
             //           ->with('totalAvg',$totalAvg)
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
            
        $pdf = PDF::loadView('pwdreport',compact('residents','total','totalMale','totalFemale'))
                        ->setPaper('a4','landscape')
                        ->setOptions(['defaultFont' => 'sans-serif']);
        
        
        return $pdf->download('pwdreport.pdf');

        return back();
    }

    
  
}

