<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Building;
use \Illuminate\Validation\Rule;
use \App\Models\Lot;
use \App\Models\Buildingtype;

class BuildingController extends Controller
{
   public function index() {
        $buildings = Building::select('buildingID', 'buildingName','buildings.buildingTypeID', 'buildings.status', 'lots.lotID','lots.lotCode','buildingtypes.buildingTypeID','buildingtypes.buildingTypeName')
                                                    ->join('lots', 'buildings.lotID', '=', 'lots.lotID')
                                                    ->join('buildingtypes', 'buildings.buildingTypeID', '=', 'buildingtypes.buildingTypeID')
                                                    -> where('buildings.archive', '=', 0)
                                                    -> get();

        return view('building',['lots' => 
                                    Lot::where([
                                                        ['status', 1], 
                                                        ['archive', 0]
                                                    ]) 
                                                    -> pluck('lotCode', 'lotID')],
                                                    ['buildingtypes' => 
                                    Buildingtype::where([
                                                        ['status', 1], 
                                                        ['archive', 0]
                                                    ]) 
                                                    -> pluck('buildingTypeName', 'buildingTypeID')]) -> with('buildings', $buildings);
    }

    public function store(Request $r) {
        if ($r->ajax()) {
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

                $insertRet = Building::insert(['buildingName'=>trim($r -> buildingName),
                                                    'archive' => 0,
                                                    'lotID' => $r -> lotID,
                                                    'buildingTypeID' => $r -> buildingTypeID,
                                                    'status' => $stat]);
            } 
            catch (Exception $exp) {
                // Catch Exceptions
            }
        }
        else {
            return view('errors.403');
        }


        return back();
    }

    public function refresh(Request $r) {
        if ($r -> ajax()) {
            return json_encode(Building::select('buildingID', 'buildingName','buildings.buildingTypeID', 'buildings.status', 'lots.lotID','lots.lotCode','buildingtypes.buildingTypeID','buildingtypes.buildingTypeName')
                                                    ->join('lots', 'buildings.lotID', '=', 'lots.lotID')
                                                    ->join('buildingtypes', 'buildings.buildingTypeID', '=', 'buildingtypes.buildingTypeID')
                                                    -> where('buildings.archive', '=', 0)
                                                    -> get());
        }
        else {
            return view('errors.403');
        }
    }

    public function getEdit(Request $r) {
        if($r->ajax()) {
            return response(Building::find($r->buildingID));
        }
        else {
            return view('errors.403');
        }
    }

    public function edit(Request $r) { 
        if ($r->ajax()) {
            $this->validate($r, [
                    'buildingName' => ['required',  'max:20', Rule::unique('buildings')->ignore($r->input('buildingID'), 'buildingID')],
                ]);
                
            $building = Building::find($r->input('buildingID'));
            $building->buildingName = $r->input('buildingName');
            $building->buildingTypeID = $r->input('buildingTypeID');
            $building->lotID = $r->input('lotID');
            $building->status = $r->input('status');
            $building->save();

            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function delete(Request $r) {
        if ($r->ajax()) {
            $building = Building::find($r->input('buildingID'));
            $building->archive = true;
            $building->save();
            
            return back();
        }
        else {
            return view('errors.403');
        }
    }
}
