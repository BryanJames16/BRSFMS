<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Resident;
use \App\Models\Businessregistration;
use Carbon\Carbon;
use PDF;

class ReportsBusinessController extends Controller
{
    public function index() {
        return view('report-business');
    }

    public function previewAll() {
        
        $total = 0;

        $regs = Businessregistration::select('registrationPrimeID', 'businessID','originalName','tradeName', 'residents.residentPrimeID', 
                                                'registrationDate','businessregistrations.address', 'categoryID','categoryName','residents.lastName',
                                                'residents.firstName', 'residents.middleName','removalDate')
                                                    ->join('businesscategories', 'businessregistrations.categoryID', '=', 'businesscategories.categoryPrimeID')
                                                    ->join('residents', 'businessregistrations.residentPrimeID', '=', 'residents.residentPrimeID')
                                                    -> where('businessregistrations.archive', '=', 0)
                                                    -> get();   
        $regsN = Businessregistration::select('registrationPrimeID', 'businessID','originalName','tradeName',  
                                                'registrationDate','businessregistrations.address', 'categoryID','categoryName','lastName',
                                                'firstName', 'middleName','removalDate')
                                                    ->join('businesscategories', 'businessregistrations.categoryID', '=', 'businesscategories.categoryPrimeID')
                                                    ->where('businessregistrations.archive', '=', 0)
                                                    ->where('residentPrimeID',null)
                                                    ->get();

        foreach($regsN as $r)
        {
            $total += 1;
        }

        foreach($regs as $r)
        {
            $total += 1;
        }


        $fromDate = null;
        $toDate = null;


        return view('preview.business')
                        ->with('fromDate',$fromDate)
                        ->with('total',$total) 
                        ->with('toDate',$toDate)    
                        ->with('regs',$regs)
                        ->with('regsN',$regsN);
    }

    public function previewRange($fromDate,$toDate) {
        
        $total = 0;

        $regs = Businessregistration::select('registrationPrimeID', 'businessID','originalName','tradeName', 'residents.residentPrimeID', 
                                                'registrationDate','businessregistrations.address', 'categoryID','categoryName','residents.lastName',
                                                'residents.firstName', 'residents.middleName','removalDate')
                                                    ->join('businesscategories', 'businessregistrations.categoryID', '=', 'businesscategories.categoryPrimeID')
                                                    ->join('residents', 'businessregistrations.residentPrimeID', '=', 'residents.residentPrimeID')
                                                    ->whereBetween('registrationDate',[$fromDate,$toDate])
                                                    -> where('businessregistrations.archive', '=', 0)
                                                    -> get();   
        $regsN = Businessregistration::select('registrationPrimeID', 'businessID','originalName','tradeName',  
                                                'registrationDate','businessregistrations.address', 'categoryID','categoryName','lastName',
                                                'firstName', 'middleName','removalDate')
                                                    ->join('businesscategories', 'businessregistrations.categoryID', '=', 'businesscategories.categoryPrimeID')
                                                    ->where('businessregistrations.archive', '=', 0)
                                                    ->whereBetween('registrationDate',[$fromDate,$toDate])
                                                    ->where('residentPrimeID',null)
                                                    ->get();

        foreach($regsN as $r)
        {
            $total += 1;
        }

        foreach($regs as $r)
        {
            $total += 1;
        }


        


        return view('preview.business')
                        ->with('fromDate',$fromDate)
                        ->with('total',$total) 
                        ->with('toDate',$toDate)    
                        ->with('regs',$regs)
                        ->with('regsN',$regsN);

        

    }

    public function printAll(){

        $total = 0;

        $regs = Businessregistration::select('registrationPrimeID', 'businessID','originalName','tradeName', 'residents.residentPrimeID', 
                                                'registrationDate','businessregistrations.address', 'categoryID','categoryName','residents.lastName',
                                                'residents.firstName', 'residents.middleName','removalDate')
                                                    ->join('businesscategories', 'businessregistrations.categoryID', '=', 'businesscategories.categoryPrimeID')
                                                    ->join('residents', 'businessregistrations.residentPrimeID', '=', 'residents.residentPrimeID')
                                                    -> where('businessregistrations.archive', '=', 0)
                                                    -> get();   
        $regsN = Businessregistration::select('registrationPrimeID', 'businessID','originalName','tradeName',  
                                                'registrationDate','businessregistrations.address', 'categoryID','categoryName','lastName',
                                                'firstName', 'middleName','removalDate')
                                                    ->join('businesscategories', 'businessregistrations.categoryID', '=', 'businesscategories.categoryPrimeID')
                                                    ->where('businessregistrations.archive', '=', 0)
                                                    ->where('residentPrimeID',null)
                                                    ->get();

        foreach($regsN as $r)
        {
            $total += 1;
        }

        foreach($regs as $r)
        {
            $total += 1;
        }


        $fromDate = null;
        $toDate = null;
            
        $pdf = PDF::loadView('pdfbusiness',compact('fromDate','toDate','total','regs','regsN'))
                        ->setPaper('a4','landscape')
                        ->setOptions(['defaultFont' => 'sans-serif']);
        
        
        return $pdf->download('Report-RegisteredBusinesses.pdf');

        return back();
    }


    public function printRange(Request $r){

        $fromDate = $r->input('fromDate');
        $toDate = $r->input('toDate');

        $total = 0;

        $regs = Businessregistration::select('registrationPrimeID', 'businessID','originalName','tradeName', 'residents.residentPrimeID', 
                                                'registrationDate','businessregistrations.address', 'categoryID','categoryName','residents.lastName',
                                                'residents.firstName', 'residents.middleName','removalDate')
                                                    ->join('businesscategories', 'businessregistrations.categoryID', '=', 'businesscategories.categoryPrimeID')
                                                    ->join('residents', 'businessregistrations.residentPrimeID', '=', 'residents.residentPrimeID')
                                                    ->whereBetween('registrationDate',[$fromDate,$toDate])
                                                    -> where('businessregistrations.archive', '=', 0)
                                                    -> get();   
        $regsN = Businessregistration::select('registrationPrimeID', 'businessID','originalName','tradeName',  
                                                'registrationDate','businessregistrations.address', 'categoryID','categoryName','lastName',
                                                'firstName', 'middleName','removalDate')
                                                    ->join('businesscategories', 'businessregistrations.categoryID', '=', 'businesscategories.categoryPrimeID')
                                                    ->where('businessregistrations.archive', '=', 0)
                                                    ->whereBetween('registrationDate',[$fromDate,$toDate])
                                                    ->where('residentPrimeID',null)
                                                    ->get();

        foreach($regsN as $r)
        {
            $total += 1;
        }

        foreach($regs as $r)
        {
            $total += 1;
        }


        $pdf = PDF::loadView('pdfbusiness',compact('fromDate','toDate','total','regs','regsN'))
                        ->setPaper('a4','landscape')
                        ->setOptions(['defaultFont' => 'sans-serif']);
        
        
        return $pdf->download('Report-RegisteredBusinesses.pdf');

        return back();
    }




}
