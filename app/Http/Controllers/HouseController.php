<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\House;
use \App\Models\Lot;

class HouseController extends Controller
{
   public function index() {
 
        $houses= \DB::table('houses') ->select('houseID', 'houseCode', 'lotCode', 'houses.status', 'houses.houseID') 
                                        ->leftJoin('LOTS', 'HOUSES.lotID', '=', 'LOTS.lotID')
                                        ->where('houses.archive', '=', 0) 
                                        ->get();
        
        return view('house',['types'=>Lot::where([['status', 1],['archive', 0]])->pluck('lotCode', 'lotID')]) -> with('houses', $houses);
    }

    public function store(Request $r) {

        $this->validate($r, [
            
            'houseCode' => 'required|unique:houses|max:11',
            ]);

        if($_POST['stat']=="active")
        {
            $stat = 1;
        }
        else if($_POST['stat']=="inactive")
        {
            $stat = 0;
        }

            
        $aah = House::insert(['houseCode'=>trim($r->houseCode),
                                            'lotID'=>$r->lotID,
                                               'archive'=>0,
                                               'status'=>$stat]);
       return back();
             
        }

    public function getEdit(Request $r) {
        
        if($r->ajax())
        {
            return response(House::find($r->houseID));
        }


    }

    public function edit(Request $r)
    {

        $house = House::find($r->input('houseID'));
        $house->houseCode = $r->input('house_code');
        $house->lotID = $r->input('lotID');
        $house->status = $r->input('stat');
        $house->save();
        return redirect('house');
    }

    public function delete(Request $r)
    {
        
        $house = House::find($r->input('houseID'));
        $house->archive = true;
        $house->save();
        return redirect('house');
        
    }
}
