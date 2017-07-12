<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\FacilityType;
use \Illuminate\Validation\Rule;

class FacilityTypeController extends Controller
{
    public function index() {
    	$facilityTypes = FacilityType::select('typeID', 'typeName', 'status')
    												-> where([
    															['archive', '=', 0]
    															])
    												-> get();

    	return view('facility-type') -> with('facilityTypes', $facilityTypes);
    }

    public function refresh(Request $r) {
        if ($r -> ajax()) {
            return json_encode(FacilityType::where("archive", "!=", "1") -> get());
        }
    }

    public function store(Request $r) {

        $this->validate($r, [
            'typeName' => 'required|unique:facilitytypes|max:30',
        ]);

        if($r -> input('status') =="active") {
            $stat = 1;
        }
        else if($r -> input('status') =="inactive") {
            $stat = 0;
        }
        else {

        }


        $aah = FacilityType::insert(['typeName'=>trim($r->typeName),
                                               'archive'=>0,
                                               'status'=>$stat]);


            return back();
        
    }

    public function getEdit(Request $r) {
    	
        if($r->ajax())
        {
            return response(FacilityType::find($r->typeID));
        }


    }

    public function edit(Request $r)
    {

        

        $this->validate($r, [
            'typeName' => ['required', 'unique:facilitytypes', 'max:30', Rule::unique('facilitytypes')->ignore($r->type_ID, 'typeID')],
        ]);

        $type = FacilityType::find($r->input('type_ID'));
        $type->typeName = $r->input('typeName');
        $type->status = $r->input('stat');
        $type->save();
        return redirect('facility-type');
    }

    public function delete(Request $r)
    {

        $type = FacilityType::find($r->input('typeID'));
        $type->archive = true;
        $type->save();
        return redirect('facility-type');
    }

}
