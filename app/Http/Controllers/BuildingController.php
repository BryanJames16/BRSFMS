<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Building;
use \Illuminate\Validation\Rule;

class BuildingController extends Controller
{
   public function index() {
        $buildings = Building::select('buildingID','buildingCode', 'buildingName','buildingType', 'status')
                                                    -> where([
                                                                ['archive', '=', 0]
                                                                ])
                                                    -> get();

        return view('building') -> with('buildings', $buildings);
    }

    public function store(Request $r) {
        try {
            $this->validate($r, [
                'buildingName' => 'required|unique:buildings|max:20',
            ]);

            if($r->input('status') == "active") {
                $stat = 1;
            }
            else if($r->input('status') == "inactive") {
                $stat = 0;
            }
            else {

            }        

            $aah = Building::insert(['buildingName'=>trim($r -> buildingName),
                                                'buildingCode'=>trim($r -> buildingCode),
                                                'archive' => 0,
                                                'buildingType' => $r -> buildingType,
                                                'status' => $stat]);
        } 
        catch (Exception $exp) {
            // echo "<script>console.log('Exception Caught!\\n' + " . $exp . ");</script>";
        }


        return back();
    }

    public function refresh(Request $r) {
        if ($r -> ajax()) {
            return json_encode(Building::where("archive", "!=", "1")->get());
        }
    }

    public function getEdit(Request $r) {
        
        if($r->ajax())
        {
            return response(Building::find($r->buildingID));
        }

    }

    public function edit(Request $r)
    { 

        $this->validate($r, [
                'buildingName' => 'required|unique:buildings|max:20',
            ]);
            
        $building = Building::find($r->input('buildingID'));
        $building->buildingCode = $r->input('buildingCode');
        $building->buildingName = $r->input('buildingName');
        $building->buildingType = $r->input('buildingType');
        $building->status = $r->input('status');
        $building->save();

        return back();
    }

    public function delete(Request $r)
    {

        $building = Building::find($r->input('buildingID'));
        $building->archive = true;
        $building->save();
        
        return back();
    }
}
