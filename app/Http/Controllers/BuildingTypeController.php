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
        if ($r->ajax()) {
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

                $insertRet = BuildingType::insert(['buildingTypeName'=>trim($r -> buildingTypeName),
                                                    'archive' => 0,
                                                    'status' => $stat]);
            } 
            catch (Exception $exp) {
                // Catch Error
            }


            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function refresh(Request $r) {
        if ($r -> ajax()) {
            return json_encode(BuildingType::where("archive", "!=", "1")->get());
        }
        else {
            return view('errors.403');
        }
    }

    public function getEdit(Request $r) {
        if($r->ajax()) {
            return response(BuildingType::find($r->buildingTypeID));
        }
        else {
            return view('errors.403');
        }
    }

    public function edit(Request $r) { 
        if ($r->ajax()) {
            $this->validate($r, [
                    'buildingTypeName' => 'required|unique:buildingtypes|max:20',
                ]);
                
            $type = BuildingType::find($r->input('buildingTypeID'));
            $type->buildingTypeName = $r->input('buildingTypeName');
            $type->status = $r->input('status');
            $type->save();

            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function delete(Request $r) {
        if ($r->ajax()) {
            $type = BuildingType::find($r->input('buildingTypeID'));
            $type->archive = true;
            $type->save();
            
            return back();
        }
        else {
            return view('errors.403');
        }
    }
}
