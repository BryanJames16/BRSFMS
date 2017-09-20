<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Resident;
use \App\Models\User;
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

class BrgyController extends Controller
{

    

    public function index() {
    	$us = User::select('id','name','email', 'firstName','middleName','lastName','position','approval','accept')
                            -> where('position','!=','Chairman')
                            -> where('accept','=',1)
                            -> where('archive','=',0)
                            -> get();

        $pendings = User::select('id','name','email', 'firstName','middleName','lastName','position','approval','accept')
                            -> where('position','!=','Chairman')
                            -> where('accept','=',0)
                            -> where('archive','=',0)
                            -> get();
        
        
    	return view('brgy')-> with('us', $us)
                                -> with('pendings', $pendings);
    }

    public function refresh(Request $r) {
        if ($r -> ajax()) {
            return json_encode(User::select('id','name','email', 'firstName','middleName','lastName','position','approval','accept')
                            -> where('position','!=','Chairman')
                            -> where('accept','=',1)
                            -> where('archive','=',0)
                            -> get());
        }
        else {
            return view('errors.403');
        }
    }

    public function pendingRefresh(Request $r) {
        if ($r -> ajax()) {
            return json_encode(User::select('id','name','email', 'firstName','middleName','lastName','position','approval','accept')
                            -> where('position','!=','Chairman')
                            -> where('accept','=',0)
                            -> where('archive','=',0)
                            -> get());
        }
        else {
            return view('errors.403');
        }
    }

    public function accept(Request $r) {
        if ($r->ajax()) {
            $type = User::find($r->input('id'));
            $type->accept = 1;
            $type->save();
            
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function reject(Request $r) {
        if ($r->ajax()) {
            $type = User::find($r->input('id'));
            $type->archive = 1;
            $type->save();
            
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function approve(Request $r) {
        if ($r->ajax()) {
            $type = User::find($r->input('id'));
            $type->approval = 1;
            $type->save();
            
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function restrict(Request $r) {
        if ($r->ajax()) {
            $type = User::find($r->input('id'));
            $type->approval = 0;
            $type->save();
            
            return back();
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

