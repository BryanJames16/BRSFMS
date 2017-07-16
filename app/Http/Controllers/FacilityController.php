<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Facility;
use \App\Models\Facilitytype;
use \Illuminate\Validation\Rule;

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
    }

    public function store(Request $r) {

        $stat = 0;

        $this->validate($r, [
            
            'facilityID' => 'required|unique:facilities|max:20',
            'facilityName' => 'required|unique:facilities|regex:/^([a-zA-Z0-9-_\' ])+$/|max:30',
            'facilityNightPrice' => 'required|numeric',
            'facilityDayPrice' => 'required|numeric',

        ]);

        if($r->input('status') == "active")
        {
            $stat = 1;
        }
        else if($r->input('status') == "inactive")
        {
            $stat = 0;
        }
        else
        {

        }

        $aah = Facility::insert(['facilityID'=>trim($r->facilityID),
                                            'facilityName'=>trim($r->facilityName),
                                            'facilityDesc'=>trim($r->facilityDesc),
                                            'facilityTypeID'=>$r->facilityType,
                                            'facilityNightPrice'=>$r->facilityNightPrice,
                                            'facilityDayPrice'=>$r->facilityDayPrice,
                                               'archive'=>0,
                                               'status'=>$stat]);
            return back();
        }

    public function getEdit(Request $r) {
        if($r->ajax()) {
            return response(Facility::find($r->input('primeID')));
        }
    }

    public function edit(Request $r) {
        $facility = Facility::find($r->input('primeID'));
        $facility->facilityName = $r->input('facilityName');
        $facility->facilityDesc = $r->input('facility_desc');
        $facility->facilityTypeID = $r->input('typeID');
        $facility->facilityDayPrice = $r->input('facilityDayPrice');
        $facility->facilityNightPrice = $r->input('facilityNightPrice');
        $facility->status = $r->input('stat');
        $facility->save();
        return redirect('facility');
    }

    public function delete(Request $r) {
        $facility = Facility::find($r->input('primeID'));
        $facility->archive = true;
        $facility->save();
        return redirect('facility');
    }
}
