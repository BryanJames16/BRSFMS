<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Facility;
use \App\Models\Utility;
use \App\Models\Facilitytype;
use \Illuminate\Validation\Rule;

require_once(app_path() . '/Includes/pktool.php');

use StaticCounter;
use SmartMove;

class FacilityController extends Controller
{
   public function index() {
 
        $facilities= \DB::table('facilities') ->select('primeID','facilityID', 'facilityName','facilityDayPrice','facilityNightPrice', 'facilityDesc', 'typeName', 'facilities.status', 'facilities.facilityTypeID') 
                                        ->join('FACILITYTYPES', 'FACILITIES.facilityTypeID', '=', 'FACILITYTYPES.typeID')
                                        ->where('facilities.archive', '=', 0) 
                                        ->get();
        
        return view('facility',['types'=>FacilityType::where([['status', 1],['archive', 0]])->pluck('typeName', 'typeID')]) -> with('facilities', $facilities);
    }

    public function refresh(Request $r) {
        if ($r -> ajax()) {
            $facilities = \DB::table('facilities') ->select('primeID', 'facilityID', 'facilityName', 
                                                                'facilityDesc', 'typeName', 'facilityDayPrice', 
                                                                'facilityNightPrice', 'facilities.status', 'facilitytypes.typeID') 
                                        ->join('FacilityTypes', 'Facilities.facilityTypeID', '=', 'FacilityTypes.typeID')
                                        ->where('Facilities.archive', '=', 0) 
                                        ->get();
            return json_encode($facilities);
        }
        else {
            return view('errors.403');
        }
    }

    public function nextPK(Request $r) {
        if ($r->ajax()) {
            $facilityPK = Utility::select('facilityPK')->get()->last();
            $facilityPKinc = StaticCounter::smart_next($facilityPK->facilityPK, SmartMove::$NUMBER);
            $lastFacilityID = Facility::all()->last();
            
            if(is_null($lastFacilityID))
            {
                return response($facilityPKinc);
            }
            else
            {
                $check = Facility::select('facilityID')->where([
                                                                ['facilityID','=',$facilityPKinc]
                                                                ])->get();
                if($check=='[]')
                {  
                    return response($facilityPKinc); 
                }
                else
                {
                    $nextValue = StaticCounter::smart_next($lastFacilityID->facilityID, SmartMove::$NUMBER);
                    return response($nextValue); 
                }
            }
        }
        else {
            return view('errors.403');
        }
    }

    public function store(Request $r) {
        if ($r->ajax()) {
            $stat = 0;

            $this->validate($r, [
                
                'facilityID' => 'required|unique:facilities|max:20',
                'facilityName' => 'required|unique:facilities|regex:/^([a-zA-Z0-9-_\' ])+$/|max:30',
                'facilityNightPrice' => 'required|numeric',
                'facilityDayPrice' => 'required|numeric',

            ]);


            $insertRet = Facility::insert(['facilityID'=>trim($r->facilityID),
                                                'facilityName'=>trim($r->facilityName),
                                                'facilityDesc'=>trim($r->facilityDesc),
                                                'facilityTypeID'=>$r->facilityType,
                                                'facilityNightPrice'=>$r->facilityNightPrice,
                                                'facilityDayPrice'=>$r->facilityDayPrice,
                                                'archive'=>0,
                                                'status'=>1]);
            return back();
        }
    }

    public function getEdit(Request $r) {
        if($r->ajax()) {
            return response(Facility::find($r->input('primeID')));
        }
        else {
            return view('errors.403');
        }
    }

    public function edit(Request $r) {
        if ($r->ajax()) {

            $this->validate($r, [
                
                'facilityName' => ['required','regex:/^([a-zA-Z0-9-_\' ])+$/',  'max:30', Rule::unique('facilities')->ignore($r->input('primeID'), 'primeID')],
                'facilityNightPrice' => 'required|numeric',
                'facilityDayPrice' => 'required|numeric',

            ]);

            $facility = Facility::find($r->input('primeID'));

            $facility->facilityName = $r->input('facilityName');
            $facility->facilityDesc = $r->input('facilityDesc');
            $facility->facilityTypeID = $r->input('facilityTypeID');
            $facility->facilityDayPrice = $r->input('facilityDayPrice');
            $facility->facilityNightPrice = $r->input('facilityNightPrice');
            $facility->status = $r->input('status');

            $facility->save();
            return redirect('facility');
        }
        else {
            return view('errors.403');
        }
    }

    public function delete(Request $r) {
        if ($r->ajax()) {
            $facility = Facility::find($r->input('primeID'));
            $facility->archive = true;
            $facility->save();
            return redirect('facility');
        }
        else {
            return view('errors.403');
        }
    }
}
