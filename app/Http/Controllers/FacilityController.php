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

    public function store(Request $r) {

        $this->validate($r, [
            
            'facilityID' => 'required|unique:facilities|max:20',
            'facilityName' => 'required|unique:facilities|regex:/^([a-zA-Z0-9-_\' ])+$/|max:30',
            'facilityNightPrice' => 'required|numeric',
            'facilityDayPrice' => 'required|numeric',

            ]);

        if($_POST['stat']=="active")
        {
            $stat = 1;
        }
        else if($_POST['stat']=="inactive")
        {
            $stat = 0;
        }

        $aah = Facility::insert(['facilityID'=>trim($r->facilityID),
                                            'facilityName'=>trim($r->facilityName),
                                            'facilityDesc'=>trim($r->desc),
                                            'facilityTypeID'=>$r->typeID,
                                            'facilityNightPrice'=>$r->facilityNightPrice,
                                            'facilityDayPrice'=>$r->facilityDayPrice,
                                               'archive'=>0,
                                               'status'=>$stat]);
            return back();
        }

    public function getEdit(Request $r) {
        
        if($r->ajax())
        {
            return response(Facility::find($r->primeID));
        }


    }

    public function edit(Request $r)
    {


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

    public function delete(Request $r)
    {

        $facility = Facility::find($r->input('primeID'));
        $facility->archive = true;
        $facility->save();
        return redirect('facility');
    }
}
