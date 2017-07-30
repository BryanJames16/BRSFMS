<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Buildingtype;
use \Illuminate\Validation\Rule;

class BuildingTypeController extends Controller
{
   public function index() {
        $buildingTypes = BuildingType::select('buildingTypeID', 'buildingTypeName', 'status')
                                                    -> where([
                                                                ['archive', '=', 0]
                                                                ])
                                                    -> get();

        return view('building-type') -> with('buildingTypes', $buildingTypes);
    }

    public function store(Request $r) {
        try {
            $this->validate($r, [
                'buildingTypeName' => 'required|unique:buildingtypes|max:20',
            ]);

            if($r->input('status') == "active") {
                $stat = 1;
            }
            else if($r->input('status') == "inactive") {
                $stat = 0;
            }
            else {

            }        

            $aah = BuildingType::insert(['buildingTypeName'=>trim($r -> buildingTypeName),
                                                'archive' => 0,
                                                'status' => $stat]);
        } 
        catch (Exception $exp) {
            // echo "<script>console.log('Exception Caught!\\n' + " . $exp . ");</script>";
        }


        return back();
    }

    public function refresh(Request $r) {
        if ($r -> ajax()) {
            return json_encode(BuildingType::where("archive", "!=", "1")->get());
        }
    }

    public function getEdit(Request $r) {
        
        if($r->ajax())
        {
            return response(BuildingType::find($r->buildingTypeID));
        }

    }

    public function edit(Request $r)
    { 

        $this->validate($r, [
                'buildingTypeName' => 'required|unique:buildingtypes|max:20',
            ]);
            
        $type = BuildingType::find($r->input('buildingTypeID'));
        $type->buildingTypeName = $r->input('buildingTypeName');
        $type->status = $r->input('status');
        $type->save();

        return back();
    }

    public function delete(Request $r)
    {

        $type = BuildingType::find($r->input('buildingTypeID'));
        $type->archive = true;
        $type->save();
        
        return back();
    }
}
