<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Unit;
use \App\Models\Lot;

class UnitController extends Controller
{
   public function index() {
 
        $units= \DB::table('units') ->select('unitID', 'unitCode', 'lotCode', 'units.status', 'units.unitID') 
                                        ->leftJoin('lots', 'units.lotID', '=', 'lots.lotID')
                                        ->where('units.archive', '=', 0) 
                                        ->get();
        
        return view('unit',['types'=>Lot::where([['status', 1],['archive', 0]])->pluck('lotCode', 'lotID')]) -> with('units', $units);
    }

    public function store(Request $r) {


        $this->validate($r, [
            
            'unitCode' => 'required|unique:units|max:20',
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
                                            'lotID'=>$r->lotID,
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

        $unit = Unit::find($r->input('unitID'));
        $unit->unitCode = $r->input('unit_code');
        $unit->lotID = $r->input('lotID');
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
