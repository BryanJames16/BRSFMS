<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Unit;
use \App\Models\Building;


class UnitController extends Controller
{
   public function index() {
 
        $units= \DB::table('units') ->select('unitID', 'unitCode', 'units.buildingID', 'units.status', 'units.unitID','buildings.buildingName') 
                                        ->leftJoin('buildings', 'units.buildingID', '=', 'buildings.buildingID')
                                        ->where('units.archive', '=', 0) 
                                        ->get();
        
        return view('unit',['types'=>Building::where([['status', 1],['archive', 0]])->pluck('buildingName', 'buildingID')]) -> with('units', $units);
    }

    public function store(Request $r) {


        $this->validate($r, [
            
            'unitCode' => 'required|max:20',
            ]);

        if($_POST['stat']=="active")
        {   
            $stat = 1;
        }
        else if($_POST['stat']=="inactive")
        {
            $stat = 0;
        }

            
        $aah = Unit::insert(['unitCode'=>trim($r->unitCode),
                                            'buildingID'=>$r->buildingID,
                                               'archive'=>0,
                                               'status'=>$stat]);
       return back();
             
        }

    public function getEdit(Request $r) {
        
        if($r->ajax())
        {
            return response(Unit::find($r->unitID));
        }


    }

    public function edit(Request $r)
    {

        $this->validate($r, [
            
            'unitCode' => 'required|max:20',
            ]);

        $unit = Unit::find($r->input('unitID'));
        $unit->unitCode = $r->input('unitCode');
        $unit->buildingID = $r->input('buildingID');
        $unit->status = $r->input('stat');
        $unit->save();
        return redirect('unit');
    }

    public function delete(Request $r)
    {
        
        $unit = Unit::find($r->input('unitID'));
        $unit->archive = true;
        $unit->save();
        return redirect('unit');
        
    }
}
