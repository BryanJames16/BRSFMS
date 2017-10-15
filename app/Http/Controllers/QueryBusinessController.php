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

require_once(app_path() . '/Includes/pktool.php');

use StaticCounter;
use SmartMove;

class QueryBusinessController extends Controller
{

    

    public function index() {
    	
        $categories = Businesscategory::select('categoryPrimeID', 'categoryName')
                                                    -> where('archive', '=', 0)
                                                    -> where('status', '=', 1)
                                                    -> get();

    	return view('query-business')->with('categories',$categories);
    }


    public function getQuery(Request $r) {
        if ($r -> ajax()) {
            return json_encode(\DB::table('businessregistrations') ->select('registrationPrimeID','businessID','originalName', 
                                                                'residents.firstName','residents.lastName','residents.middleName',
                                                                'tradeName','registrationDate', 'businessregistrations.address', 
                                                                'residents.gender', 
                                                                'businesscategories.categoryName')
    												->join('businesscategories', 'businessregistrations.categoryID', '=', 'businesscategories.categoryPrimeID')
                                                    ->join('residents', 'businessregistrations.residentPrimeID', '=', 'residents.residentPrimeID')
                                                    -> where('businessregistrations.archive','0')
                                                    -> where('residents.lastName','like','%'.$r->input('lastName').'%')
                                                    -> where('residents.firstName','like','%'.$r->input('firstName').'%')
                                                    -> where('residents.middleName','like','%'.$r->input('middleName').'%')
                                                    -> where('businessID','like','%'.$r->input('businessID').'%')
                                                    -> where('residents.gender','like','%'.$r->input('gender').'%')
                                                    -> where('originalName','like','%'.$r->input('originalName').'%')
                                                    -> where('tradeName','like','%'.$r->input('tradeName').'%')
                                                    -> where('businessregistrations.address','like','%'.$r->input('address').'%')
                                                    -> where('businessregistrations.categoryID','like','%'.$r->input('categoryID').'%')
                                                    -> whereBetween('registrationDate',[$r->input('fromDate'),$r->input('toDate')])
                                                    -> get());
        }
        else {
            return view('errors.403');
        }
    }

	
    public function getEdit(Request $r) {
        if($r->ajax()) {
            return json_encode(\DB::table('residents') ->select('registrationPrimeID','businessID','originalName', 
                                                                'residents.firstName','residents.lastName','residents.middleName',
                                                                'tradeName','registrationDate', 'businessregistrations.address', 
                                                                'residents.gender', 
                                                                'businesscategories.categoryName') 
                                        ->join('businesscategories', 'businessregistrations.categoryID', '=', 'businesscategories.categoryPrimeID')
                                        ->join('residents', 'businessregistrations.residentPrimeID', '=', 'residents.residentPrimeID')
                                        ->get());
        }
        else {
            return view('errors.403');
        }

    }

    
  
}

