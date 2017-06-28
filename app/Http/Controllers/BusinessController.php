<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Business;
use \App\Models\Businesscategory;

class BusinessController extends Controller
{
   public function index() {
 
        $businesses= \DB::table('businesses') ->select('businessPrimeID','businessID', 'businessName', 'businessDesc','businessType', 'categoryName', 'businesses.status', 'businesses.categoryPrimeID') 
                                        ->join('BUSINESSCATEGORIES', 'BUSINESSES.categoryPrimeID', '=', 'BUSINESSCATEGORIES.categoryPrimeID')
                                        ->where('businesses.archive', '=', 0) 
                                        ->get();
        return view('business',['categories'=>BusinessCategory::where([['status', 1],['archive', 0]])->pluck('categoryName', 'categoryPrimeID')]) -> with('businesses', $businesses);
    }

    public function store(Request $r) {

        $this->validate($r, [
            
            'businessID' => 'required|unique:businesses|max:20',
            'businessName' => 'required|unique:businesses|max:30',
            ]);

        if($_POST['stat']=="active")
        {
            $stat = 1;
        }
        else if($_POST['stat']=="inactive")
        {
            $stat = 0;
        }

        $aah = Business::insert(['businessID'=>trim($r->businessID),
                                            'businessName'=>trim($r->businessName),
                                            'businessDesc'=>trim($r->desc),
                                            'businessType'=>$r->type,
                                            'categoryPrimeID'=>$r->categoryPrimeID,
                                               'archive'=>0,
                                               'status'=>$stat]);


            return back();
        }

    public function getEdit(Request $r) {
        
        if($r->ajax())
        {
            return response(Business::find($r->businessPrimeID));
        }


    }

    public function edit(Request $r)
    {

        $business = Business::find($r->input('businessPrimeID'));
        $business->businessName = $r->input('business_name');
        $business->businessDesc = $r->input('business_desc');
        $business->businessType = $r->input('type');
        $business->categoryPrimeID = $r->input('categoryPrimeID');
        $business->status = $r->input('stat');
        $business->save();
        return redirect('business');
    }

    public function delete(Request $r)
    {

        $business = Business::find($r->input('businessPrimeID'));
        $business->archive = true;
        $business->save();
        return redirect('business');
    }
}
