<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Resident;
use \App\Models\Lot;
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

class QueryDocumentController extends Controller
{

    

    public function index() {
    	$residents = Resident::select('residentPrimeID','imagePath','residentID', 'firstName','lastName','middleName','suffix', 'status', 'contactNumber', 'gender', 'birthDate', 'civilStatus','seniorCitizenID','disabilities', 'residentType')
    												-> where('status','1')
                                                    -> get();
        
        $streetss = Street::select('streetID','streetName', 'status')
    												-> where('archive','0')
                                                    -> get();

        $mem = Familymember::select('peoplePrimeID')->get();

        $memberss = \DB::table('residents') ->select('residentPrimeID')
                                                    -> whereNotIn('residentPrimeID',$mem)
                                                    -> get();
       
        $families= \DB::table('families') ->select('families.familyPrimeID','familyID', 'familyHeadID', 'familyName',
                                                    'familyRegistrationDate', 'families.archive','residents.firstName',
                                                     'residents.middleName','residents.lastName',\DB::raw('count(familyMemberPrimeID) as number')) 
                                        ->leftjoin('familymembers','familymembers.familyPrimeID','=','families.familyPrimeID')
                                        ->join('residents', 'families.familyHeadID', '=', 'residents.residentPrimeID')
                                        ->groupBy('families.familyPrimeID')
                                        ->groupBy('familyID')
                                        ->groupBy('familyHeadID')
                                        ->groupBy('familyName')
                                        ->groupBy('familyRegistrationDate')
                                        ->groupBy('families.archive')
                                        ->groupBy('residents.firstName')
                                        ->groupBy('residents.middleName')
                                        ->groupBy('residents.lastName')
                                        ->where('families.archive', '=', 0) 
                                        ->get();

    	return view('query-document',
                                ['streets'=>Street::where([['status', 1],['archive', 0]])->pluck('streetName', 'streetID')],
		                        ['lots'=>Lot::where([['status', 1],['archive', 0]])->pluck('lotCode', 'lotID')])
                                -> with('residents', $residents)
                                -> with('streetss', $streetss)
                                -> with('families',$families)
                                -> with('memberss',$memberss);
    }

    public function refresh(Request $r) {
        if ($r -> ajax()) {
            return json_encode(Resident::where("status", "=", "1") -> get());
        }
        else {
            return view('errors.403');
        }
    }

    public function familyRefresh(Request $r) {
        if ($r -> ajax()) {
            return json_encode(\DB::table('families') ->select('families.familyPrimeID','familyID', 'familyHeadID', 'familyName',
                                                    'familyRegistrationDate', 'families.archive','residents.firstName',
                                                     'residents.middleName','residents.lastName',\DB::raw('count(familyMemberPrimeID) as number')) 
                                        ->leftjoin('familymembers','familymembers.familyPrimeID','=','families.familyPrimeID')
                                        ->join('residents', 'families.familyHeadID', '=', 'residents.residentPrimeID')
                                        ->groupBy('families.familyPrimeID')
                                        ->groupBy('familyID')
                                        ->groupBy('familyHeadID')
                                        ->groupBy('familyName')
                                        ->groupBy('familyRegistrationDate')
                                        ->groupBy('families.archive')
                                        ->groupBy('residents.firstName')
                                        ->groupBy('residents.middleName')
                                        ->groupBy('residents.lastName')
                                        ->where('families.archive', '=', 0) 
                                        ->get());
        }
        else {
            return view('errors.403');
        }
    }

	public function store(Request $r) {
        if ($r->ajax()) {

            $this->validate($r, [
                'residentID' => 'required|unique:residents|max:20',
                'firstName' => 'required|max:30|min:2',
                'middleName' => 'min:0|max:30',
                'lastName' => 'required|min:2|max:30',
                'birthDate' => 'required|date|before:tomorrow',
                'seniorCitizenID' => 'nullable|alpha_dash|min:0|max:20',
                'disabilities' => 'nullable|alpha_dash|min:0|max:250',
            ]);

            $insertRet = Resident::insert(['residentID'=>trim($r -> input('residentID')),
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
                                                
            $genAddRet = Generaladdress::insert(['addressType' => $r -> input('addressType'),
                                                'residentPrimeID' => $findRet -> residentPrimeID,
                                                'streetID' => $r -> input('streetID'),
                                                'lotID' => $r -> input('lotID'),
                                                'buildingID' => $r -> input('buildingID'),
                                                'unitID' => $r -> input('unitID')]);

            if($r -> input('currentWork')!="") {
                $resRet = Residentbackground::insert(['currentWork' => $r -> input('currentWork'),
                                                'monthlyIncome' => $r -> input('monthlyIncome'),
                                                'peoplePrimeID' => $findRet -> residentPrimeID,
                                                'dateStarted' => Carbon::now(),
                                                'status' => 1,
                                                'archive' => 0]);
            }
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function familyStore(Request $r) {
        if ($r->ajax()) { 


            $this->validate($r, [
                'familyID' => 'required|unique:families',
                'familyHeadID' => 'required',
                'familyName' => 'required|unique:families|max:30|min:5',
            ]);

            $insertRet = Family::insert(['familyID'=>trim($r -> input('familyID')),
                                            'familyHeadID' => $r -> input('familyHeadID'),
                                            'familyName' => $r -> input('familyName'),
                                            'familyRegistrationDate' => Carbon::now(),
											   'archive' => 0]);


            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function nextPK(Request $r) {
        if ($r->ajax()) {
            $residentPK = Utility::select('residentPK')->get()->last();
            $residentPKinc = StaticCounter::smart_next($residentPK->residentPK, SmartMove::$NUMBER);
            $lastResidentID = Resident::all()->last();
            
            if (is_null($lastResidentID)) {
                return response($residentPKinc);
            }
            else {
                $check = Resident::select('residentID')->where([
                                                                ['residentID','=',$residentPKinc]
                                                                ])->get();
                if($check=='[]')
                {  
                    return response($residentPKinc); 
                }
                else
                {
                    $nextValue = StaticCounter::smart_next($lastResidentID->residentID, SmartMove::$NUMBER);
                    return response($nextValue); 
                }
            }
        }
        else {
            return view('errors.403');
        }
    }

    public function familyNextPK(Request $r) {
        if ($r->ajax()) {
            $familyPK = Utility::select('familyPK')->get()->last();
            $familyPKinc = StaticCounter::smart_next($familyPK->familyPK, SmartMove::$NUMBER);
            $lastFamilyID = Family::all()->last();
            
            if(is_null($lastFamilyID))
            {
                return response($familyPKinc);
            }
            else
            {
                $check = Family::select('familyID')->where([
                                                                ['familyID','=',$familyPKinc]
                                                                ])->get();
                if($check=='[]')
                {  
                    return response($familyPKinc); 
                }
                else
                {
                    $nextValue = StaticCounter::smart_next($lastFamilyID->familyID, SmartMove::$NUMBER);
                    return response($nextValue); 
                }
            }
        }
        else {
            return view('errors.403');
        }
    }

    public function getEdit(Request $r) {
        if($r->ajax()) {
            return json_encode(\DB::table('residents') ->select('residents.residentPrimeID','imagePath','residentID', 'firstName',
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
                                        ->orderby('backgroundPrimeID','desc') 
                                        ->limit(1)
                                        ->get());
        }
        else {
            return view('errors.403');
        }

    }

    public function familyGetEdit(Request $r) {
        if($r->ajax()) {
            return response(Family::find($r->input('familyPrimeID')));
        }
        else {
            return view('errors.403');
        }
    }

    public function getMembers(Request $r) {
        if($r->ajax()) {
            return json_encode( \DB::table('residents') ->select('residentPrimeID','familymembers.familyMemberPrimeID','imagePath','firstName','middleName', 'lastName','families.familyName','birthDate', 'familymembers.memberRelation',
                                                    'gender') 
                                        ->join('familymembers', 'residents.residentPrimeID', '=', 'familymembers.peoplePrimeID')
                                        ->join('families', 'familymembers.familyPrimeID', '=', 'families.familyPrimeID')
                                        ->where('familymembers.familyPrimeID', '=', $r->input('familyPrimeID'))
                                        ->get());
        }
        else {
            return view('errors.403');
        }
    }

    public function getRelation(Request $r) {
        if($r->ajax()) {
            return json_encode( \DB::table('residents') ->select('residentPrimeID','imagePath','firstName','middleName', 'lastName','families.familyName','birthDate', 'familymembers.memberRelation','familymembers.familyMemberPrimeID',
                                                    'gender') 
                                        ->join('familymembers', 'residents.residentPrimeID', '=', 'familymembers.peoplePrimeID')
                                        ->join('families', 'familymembers.familyPrimeID', '=', 'families.familyPrimeID')
                                        ->where('familymembers.familyMemberPrimeID', '=', $r->input('familyMemberPrimeID'))
                                        ->get());
        }
        else {
            return view('errors.403');
        }
    }

    public function getFamilyHead(Request $r) {
        if($r->ajax()) {
            return json_encode( \DB::table('residents') ->select('residentPrimeID','imagePath','firstName','middleName', 'lastName','families.familyName','birthDate',
                                                    'gender') 
                                        ->join('families', 'residents.residentPrimeID', '=', 'families.familyHeadID')
                                        ->where('families.familyPrimeID', '=', $r->input('familyPrimeID'))
                                        ->get());
        }
        else {
            return view('errors.403');
        }
    }


    public function getLot(Request $r) {
        if($r->ajax()) {
            return json_encode( \DB::table('lots') ->select('lotID','lotCode') 
                                        ->join('streets', 'lots.streetID', '=', 'streets.streetID')
                                        ->where('lots.status', '=', 1)
                                        ->where('lots.archive', '=', 0)
                                        ->where('lots.streetID', '=', $r->input('streetID'))
                                        ->get());
        }
        else {
            return view('errors.403');
        }
    }

    public function getBuilding(Request $r) {
        if($r->ajax()) {
            return json_encode( \DB::table('buildings') ->select('buildingID','buildingName') 
                                        ->join('lots', 'buildings.lotID', '=', 'lots.lotID')
                                        ->where('buildings.status', '=', 1)
                                        ->where('buildings.archive', '=', 0)
                                        ->where('buildings.lotID', '=', $r->input('lotID'))
                                        ->get());
        }
        else {
            return view('errors.403');
        }
    }

    public function getUnit(Request $r) {
        if($r->ajax()) {
            return json_encode( \DB::table('units') ->select('unitID','unitCode') 
                                        ->join('buildings', 'units.buildingID', '=', 'buildings.buildingID')
                                        ->where('units.status', '=', 1)
                                        ->where('units.archive', '=', 0)
                                        ->where('buildings.buildingID', '=', $r->input('buildingID'))
                                        ->get());
        }
        else {
            return view('errors.403');
        }
    }

    public function delete(Request $r) {
        if ($r->ajax()) {
            $type = Resident::find($r->input('residentPrimeID'));
            $type->status = 0;
            $type->save();
            
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function memberRemove(Request $r) {
        if ($r->ajax()) {
            $participants = \DB::table('familymembers')
                            ->where('familyPrimeID', '=', $r->input('familyPrimeID'))
                            ->where('peoplePrimeID', '=', $r->input('peoplePrimeID'))
                            ->delete();
        }
        else {
            return view('errors.403');
        }
    }

    public function familyDelete(Request $r) {
        if ($r->ajax()) {
            $type = Family::find($r->input('familyPrimeID'));
            $type->archive = 1;
            $type->save();
            
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function edit(Request $r) { 
        if ($r->ajax()) {

            $this->validate($r, [
                'residentID' => 'required|max:20',
                'firstName' => 'required|max:30|min:2',
                'middleName' => 'min:0|max:30',
                'lastName' => 'required|min:2|max:30',
                'birthDate' => 'required|date|before:tomorrow',
                'seniorCitizenID' => 'nullable|alpha_dash|min:0|max:20',
                'disabilities' => 'nullable|alpha_dash|min:0|max:250',
            ]);

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

            if( ($r -> input('work')!= $r -> input('hiddenWork')) || 
                    ($r -> input('salary')!=$r -> input('hiddenIncome')) ) {
                $insertRet = ResidentBackground::insert(['currentWork' => $r -> input('currentWork'),
                                                'monthlyIncome' => $r -> input('monthlyIncome'),
                                                'dateStarted' => Carbon::now(),
                                                'peoplePrimeID' => $r -> input('residentPrimeID'),
                                                'status' => 1,
                                                'archive' => 0]);
            }

            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function updateRelation(Request $r) { 
        if ($r->ajax()) {

            $type = Familymember::find($r->input('familyMemberPrimeID'));
            $type->memberRelation = $r->input('memberRelation');
            $type->save();

            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function join(Request $r) {
        if ($r->ajax()) {
            $insertRet = Familymember::insert(['familyPrimeID'=>$r -> input('familyPrimeID'),
                                                'peoplePrimeID' => $r -> input('peoplePrimeID'),
                                                'memberRelation' => $r -> input('memberRelation'),
                                                'archive' => 0]);
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function addImage(Request $r){
       
            $fileName = $r->imagePath->getClientOriginalName();
            $r->imagePath->storeAs('public/upload', $fileName);

            $type = Resident::find($r->input('rID'));
            $type->imagePath = $fileName;
            $type->save();


            return back();
        
    }

    public function notMember($id) {
        $mem = Familymember::select('peoplePrimeID')
                            -> where('familyPrimeID','=',$id)
                            ->get();

        

        return json_encode(\DB::table('residents')->select('residentPrimeID', 'residentID', 
                                                            'firstName', 'lastName', 'middleName', 
                                                            'suffix', 'status', 'contactNumber', 
                                                            'gender', 'birthDate', 'civilStatus', 
                                                            'seniorCitizenID', 'disabilities', 
                                                            'residentType')
                                                -> whereNotIn('residentPrimeID',$mem)
                                                -> get());
    }

  
}

