<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Resident;
use \App\Models\Lot;
use \App\Models\House;
use \App\Models\Unit;
use \App\Models\Street;
use \App\Models\Family;
use \App\Models\Familymember;
use Carbon\Carbon;

require_once(app_path() . "/includes/pktool.php");

use StaticCounter;
use SmartMove;

class ResidentController extends Controller
{

    public function _construct(){

        $this->middleware('auth');
    }

    public function index() {
    	$residents = Resident::select('residentPrimeID','residentID', 'firstName','lastName','middleName','suffix', 'status', 'contactNumber', 'gender', 'birthDate', 'civilStatus','seniorCitizenID','disabilities', 'residentType')
    												-> where('status','1')
                                                    -> get();
        
        $streetss = Street::select('streetID','streetName', 'status')
    												-> where('archive','0')
                                                    -> get();
        $houses = House::select('houseID','houseCode', 'status')
    												-> where('archive','0')
                                                    -> get();
        $lots = Lot::select('lotID','lotCode', 'status')
    												-> where('archive','0')
                                                    -> get();
        $units = Unit::select('unitID','unitCode', 'status')
    												-> where('archive','0')
                                                    -> get();
       
        $families= \DB::table('families') ->select('familyPrimeID','familyID', 'familyHeadID', 'familyName',
                                                    'familyRegistrationDate', 'archive','residents.firstName',
                                                     'residents.middleName','residents.lastName') 
                                        ->join('residents', 'families.familyHeadID', '=', 'residents.residentPrimeID')
                                        ->where('families.archive', '=', 0) 
                                        ->get();
        

    	return view('resident',
                                ['streets'=>Street::where([['status', 1],['archive', 0]])->pluck('streetName', 'streetID')],
		                        ['lots'=>Lot::where([['status', 1],['archive', 0]])->pluck('lotCode', 'lotID')])
                                -> with('residents', $residents)
                                -> with('streetss', $streetss)
                                -> with('houses', $houses)
                                -> with('units', $units)
                                -> with('lots', $lots)
                                -> with('families',$families);


    }

    public function refresh(Request $r) 
    {
        if ($r -> ajax()) 
        {
            return json_encode(Resident::where("status", "=", "1") -> get());
        }
    }

	public function store(Request $r) 
    {
        
        $stat = 1;
        $aah = Resident::insert(['residentID'=>trim($r -> input('residentID')),
                                            'firstName' => trim($r -> input('firstName')),
                                            'middleName' => trim($r -> input('middleName')),
                                            'lastName' => $r -> input('lastName'),
                                            'suffix' => $r -> input('suffix'),
											'contactNumber' => $r -> input('contactNumber'),
                                            'gender' => $r -> input('gender'),
											'birthDate' => $r -> input('birthDate'),
											'civilStatus' => $r -> input('civilStatus'),
											'seniorCitizenID' => $r -> input('seniorCitizenID'),
											'disabilities' => $r -> input('disabilities'),
											'residentType' => $r -> input('residentType'),
											   'status' => $stat]);


            return back();
    }

    public function familyStore(Request $r) 
    {
        $aah = Family::insert(['familyID'=>trim($r -> input('familyID')),
                                            'familyHeadID' => $r -> input('familyHeadID'),
                                            'familyName' => $r -> input('familyName'),
                                            'familyRegistrationDate' => Carbon::now(),
											   'archive' => 0]);


            return back();
    }

    public function nextPK(Request $r) {
        if ($r->ajax()) {
            $data = Resident::all()->last();
            
            if (is_null($data)) {
                
            } 
            else {
                $nextValue = StaticCounter::smart_next($data->residentID, SmartMove::$NUMBER);
                return response($nextValue);
            }
        }
    }

    public function familyNextPK(Request $r) {
        if ($r->ajax()) {
            $data = Family::all()->last();
            
            if (is_null($data)) {
                
            } 
            else {
                $nextValue = StaticCounter::smart_next($data->familyID, SmartMove::$NUMBER);
                return response($nextValue);
            }
        }
    }

    public function getEdit(Request $r) {
        
        if($r->ajax())
        {
            return response(Resident::find($r->input('residentPrimeID')));
        }

    }

    public function delete(Request $r)
    {

        $type = Resident::find($r->input('residentPrimeID'));
        $type->status = 0;
        $type->save();
        
        return back();
    }

    public function edit(Request $r)
    { 
        $type = Resident::find($r->input('residentPrimeID'));
        $type->residentID = $r->input('residentID');
        $type->firstName = $r->input('firstName');
        $type->middleName = $r->input('middleName');
        $type->lastName = $r->input('lastName');
        $type->suffix = $r->input('suffix');
        $type->gender = $r->input('gender');
        $type->birthDate = $r->input('birthDate');
        $type->civilStatus = $r->input('civilStatus');
        $type->seniorCitizenID = $r->input('seniorCitizenID');
        $type->disabilities = $r->input('disabilities');
        $type->residentType = $r->input('residentType');
        $type->contactNumber = $r->input('contactNumber');
        $type->save();

        return back();
    }
}

