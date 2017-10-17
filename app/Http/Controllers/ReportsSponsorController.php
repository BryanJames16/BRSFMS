<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Resident;
use \App\Models\Servicetransaction;
use Carbon\Carbon;
use PDF;

class ReportsSponsorController extends Controller
{
    public function index() {
        
        $services = Servicetransaction::where('status','Finished')
                                        ->where('archive','0')
                                        ->get();
        
        return view('report-sponsor')->with('services',$services);
    }

    public function preview($id) {
        $sponsorsRes= \DB::table('sponsors')
                                        ->join('residents', 'sponsors.resiID','=','residents.residentPrimeID')
                                        ->where('sponsors.sID',$id)
                                        ->get();

        $sponsorsNonRes= \DB::table('sponsors')
                                        ->where('resiID',null)
                                        ->where('sponsors.sID',$id)
                                        ->get();
        $items= \DB::table('sponsoritems')
                                        ->join('sponsors', 'sponsoritems.sponsorID','=','sponsors.sponsorID')
                                        ->where('sponsors.sID',$id)
                                        ->get();

        $name= \DB::table('servicetransactions')->where('serviceTransactionPrimeID',$id)
                                        ->get()
                                        ->last();
        $totalSponsors = 0;
        $totalItems = 0;

        foreach($sponsorsRes as $asd){
            $totalSponsors += 1;
        }

        foreach($sponsorsNonRes as $asd){
            $totalSponsors += 1;
        }

        foreach($items as $a){
            $totalItems += $a->quantity;
        }



        return view('preview.sponsor')
                        ->with('totalSponsors',$totalSponsors)
                        ->with('sponsorsRes',$sponsorsRes)
                        ->with('sponsorsNonRes',$sponsorsNonRes)
                        ->with('name',$name)
                        ->with('items',$items)
                        ->with('totalItems',$totalItems);
    }

    


    public function print(Request $r){

        $id = $r->input('id');

        $sponsorsRes= \DB::table('sponsors')
                                        ->join('residents', 'sponsors.resiID','=','residents.residentPrimeID')
                                        ->where('sponsors.sID',$id)
                                        ->get();

        $sponsorsNonRes= \DB::table('sponsors')
                                        ->where('resiID',null)
                                        ->where('sponsors.sID',$id)
                                        ->get();
        $items= \DB::table('sponsoritems')
                                        ->join('sponsors', 'sponsoritems.sponsorID','=','sponsors.sponsorID')
                                        ->where('sponsors.sID',$id)
                                        ->get();

        $name= \DB::table('servicetransactions')->where('serviceTransactionPrimeID',$id)
                                        ->get()
                                        ->last();
        $totalSponsors = 0;
        $totalItems = 0;

        foreach($sponsorsRes as $asd){
            $totalSponsors += 1;
        }

        foreach($sponsorsNonRes as $asd){
            $totalSponsors += 1;
        }

        foreach($items as $a){
            $totalItems += $a->quantity;
        }

        

        $pdf = PDF::loadView('pdfsponsor',compact('sponsorsRes','name','sponsorsNonRes','totalSponsors','totalItems','items'))
                        ->setPaper('a4','landscape')
                        ->setOptions(['defaultFont' => 'sans-serif']);
        
        
        return $pdf->download('Report-ServiceSponsors.pdf');

        return back();
    }




}
