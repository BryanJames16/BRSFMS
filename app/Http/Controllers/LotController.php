<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Lot;
use \App\Models\Street;
use \App\Models\Barangay;

class LotController extends Controller
{
   public function index() {
 
        $lots= \DB::table('lots') ->select('lotID', 'lotCode', 'streetName', 'lots.status', 'lots.lotID') 
                                        ->leftJoin('STREETS', 'LOTS.streetID', '=', 'STREETS.streetID')
                                        ->where('lots.archive', '=', 0) 
                                        ->get();
        $streets= \DB::table('streets') ->select('streetID', 'streetName') 
                                        ->where([['archive', '=', 0],['status','=','1']]) 
                                        ->get();
        
        return view('lot',
                        ['types'=>Street::where([['status', 1],['archive', 0]])
                        ->pluck('streetName', 'streetID')])
                         -> with('lots', $lots) 
                         -> with('streets', $streets);
    }

    public function store(Request $r) {

        $this->validate($r, [
            
            'lotCode' => 'required|unique:lots|max:5',
            ]);


        if($_POST['stat']=="active")
        {
            $stat = 1;
        }
        else if($_POST['stat']=="inactive")
        {
            $stat = 0;
        }

            
        $aah = Lot::insert(['lotCode'=>trim($r->lotCode),
                                            'streetID'=>$r->streetID,
                                               'archive'=>0,
                                               'status'=>$stat]);
       return back();
             
        }

    public function getEdit(Request $r) {
        
        if($r->ajax())
        {
            return response(Lot::find($r->lotID));
        }


    }

   

    public function edit(Request $r)
    {

        $lot = Lot::find($r->input('lotID'));
        $lot->lotCode = $r->input('lot_code');
        $lot->streetID = $r->input('streetID');
        $lot->status = $r->input('stat');
        $lot->save();
        return redirect('lot');
    }

    public function delete(Request $r)
    {
        
        $lot = Lot::find($r->input('lotID'));
        $lot->archive = true;
        $lot->save();
        return redirect('lot');
        
    }
}
