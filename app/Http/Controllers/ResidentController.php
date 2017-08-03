<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Resident;
use \App\Models\Lot;
use \App\Models\Unit;
use \App\Models\Street;
use \App\Models\Family;
use \App\Models\Generaladdress;
use \App\Models\Familymember;
use \App\Models\Residentbackground;
use Carbon\Carbon;

require_once(app_path() . '/Includes/pktool.php');

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
                                -> with('families',$families);


    }

    public function refresh(Request $r) 
    {
        if ($r -> ajax()) 
        {
            return json_encode(Resident::where("status", "=", "1") -> get());
        }
    }

    public function familyRefresh(Request $r) 
    {
        if ($r -> ajax()) 
        {
            return json_encode(\DB::table('families') ->select('familyPrimeID','familyID', 'familyHeadID', 'familyName',
                                                    'familyRegistrationDate', 'archive','residents.firstName',
                                                     'residents.middleName','residents.lastName') 
                                        ->join('residents', 'families.familyHeadID', '=', 'residents.residentPrimeID')
                                        ->where('families.archive', '=', 0) 
                                        ->get());
        }
    }

	public function store(Request $r) 
    {
        
        
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
											   'status' => 1]);

        $findRet = Resident::all() -> last();
                                               
        $aa = Generaladdress::insert(['addressType' => $r -> input('addressType'),
                                            'residentPrimeID' => $findRet -> residentPrimeID,
                                            'streetID' => $r -> input('streetID'),
                                            'lotID' => $r -> input('lotID'),
											'buildingID' => $r -> input('buildingID'),
                                            'unitID' => $r -> input('unitID')]);

        if($r -> input('currentWork')!="")
        {
            $aa = Residentbackground::insert(['currentWork' => $r -> input('currentWork'),
                                            'monthlyIncome' => $r -> input('monthlyIncome'),
                                            'peoplePrimeID' => $findRet -> residentPrimeID,
                                            'dateStarted' => Carbon::now(),
                                            'status' => 1,
                                            'archive' => 0]);
        }
                                
        



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
            return json_encode(\DB::table('residents') ->select('residents.residentPrimeID','residentID', 'firstName',
                                                                'lastName','middleName','suffix', 'residents.status', 
                                                                'contactNumber', 'gender', 'birthDate',
                                                                'civilStatus','seniorCitizenID','disabilities',
                                                                'residentType','generaladdresses.addressType',
                                                                'generaladdresses.streetID','generaladdresses.lotID',
                                                                'generaladdresses.unitID','generaladdresses.buildingID',
                                                                'generaladdresses.personAddressID', 'residentbackgrounds.currentWork', 
                                                                'residentBackgrounds.monthlyIncome') 
                                        ->join('generaladdresses', 'residents.residentPrimeID', '=', 'generaladdresses.residentPrimeID')
                                        ->join('residentBackgrounds', 'residents.residentPrimeID', '=', 'residentBackgrounds.peoplePrimeID')
                                        ->where('residents.status', '=', 1) 
                                        ->where('generaladdresses.residentPrimeID', '=', $r->input('residentPrimeID'))
                                        ->orderby('dateStarted','desc') 
                                        ->limit(1)
                                        ->get());
        }

    }

    public function familyGetEdit(Request $r) {
        
        if($r->ajax())
        {
            return response(Family::find($r->input('familyPrimeID')));
        }

    }

    public function getMembers(Request $r) {
        
        if($r->ajax())
        {
            return json_encode( \DB::table('residents') ->select('residentPrimeID','firstName','middleName', 'lastName','families.familyName','birthDate', 'familymembers.memberRelation',
                                                    'gender') 
                                        ->join('familymembers', 'residents.residentPrimeID', '=', 'familymembers.peoplePrimeID')
                                        ->join('families', 'familymembers.familyPrimeID', '=', 'families.familyPrimeID')
                                        ->where('familymembers.familyPrimeID', '=', $r->input('familyPrimeID'))
                                        ->get());
        }

    }

    public function getLot(Request $r) {
        
        if($r->ajax())
        {
            return json_encode( \DB::table('lots') ->select('lotID','lotCode') 
                                        ->join('streets', 'lots.streetID', '=', 'streets.streetID')
                                        ->where('lots.status', '=', 1)
                                        ->where('lots.archive', '=', 0)
                                        ->where('lots.streetID', '=', $r->input('streetID'))
                                        ->get());
        }

    }


    public function getBuilding(Request $r) {
        
        if($r->ajax())
        {
            return json_encode( \DB::table('buildings') ->select('buildingID','buildingName') 
                                        ->join('lots', 'buildings.lotID', '=', 'lots.lotID')
                                        ->where('buildings.status', '=', 1)
                                        ->where('buildings.archive', '=', 0)
                                        ->where('buildings.lotID', '=', $r->input('lotID'))
                                        ->get());
        }

    }

    public function getUnit(Request $r) {
        
        if($r->ajax())
        {
            return json_encode( \DB::table('units') ->select('unitID','unitCode') 
                                        ->join('buildings', 'units.buildingID', '=', 'buildings.buildingID')
                                        ->where('units.status', '=', 1)
                                        ->where('units.archive', '=', 0)
                                        ->where('buildings.buildingID', '=', $r->input('buildingID'))
                                        ->get());
        }

    }

    public function delete(Request $r)
    {

        $type = Resident::find($r->input('residentPrimeID'));
        $type->status = 0;
        $type->save();
        
        return back();
    }

    public function familyDelete(Request $r)
    {

        $type = Family::find($r->input('familyPrimeID'));
        $type->archive = 1;
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

        $address = GeneralAddress::find($r->input('personAddressID'));
        $address->addressType = $r->input('addressType');
        $address->streetID = $r->input('streetID');
        $address->buildingID = $r->input('buildingID');
        $address->unitID = $r->input('unitID');
        $address->lotID = $r->input('lotID');
        $address->save();

        if( ($r -> input('work')!= $r -> input('hiddenWork')) || ($r -> input('salary')!=$r -> input('hiddenIncome')) )
        {
            $aal = ResidentBackground::insert(['currentWork' => $r -> input('currentWork'),
                                            'monthlyIncome' => $r -> input('monthlyIncome'),
                                            'dateStarted' => Carbon::now(),
                                            'peoplePrimeID' => $r -> input('residentPrimeID'),
											'status' => 1,
                                            'archive' => 0]);
        }

        
;        

        return back();
    }
}

