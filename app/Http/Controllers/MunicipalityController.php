<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Municipality;
use \App\Models\Province;

class MunicipalityController extends Controller
{
   public function index() {
 
        $municipalities= \DB::table('municipalities') ->select('municipalityID', 'municipalityName', 'provinceName', 'municipalities.status', 'municipalities.provinceID') 
                                        ->leftJoin('PROVINCES', 'MUNICIPALITIES.provinceID', '=', 'PROVINCES.provinceID')
                                        ->where('municipalities.archive', '=', 0) 
                                        ->get();
        
        return view('municipality',['types'=>Province::where([['status', 1],['archive', 0]])->pluck('provinceName', 'provinceID')]) -> with('municipalities', $municipalities);
    }

    public function store(Request $r) {


        if($_POST['stat']=="active")
        {
            $stat = 1;
        }
        else if($_POST['stat']=="inactive")
        {
            $stat = 0;
        }

        if($r->chk == "checked")
        {
            
            $aah = Municipality::insert(['municipalityName'=>$r->name,
                                            'provinceID'=>$r->provinceID,
                                               'archive'=>0,
                                               'status'=>$stat]);
            return back();
             
        }
        else
        {
            
            $aah = Municipality::insert(['municipalityName'=>$r->name,
                                               'archive'=>0,
                                               'status'=>$stat]);
            return back();  
            
        }


        
        }

    public function getEdit(Request $r) {
        
        if($r->ajax())
        {
            return response(Municipality::find($r->municipalityID));
        }


    }

    public function edit(Request $r)
    {

        $municipality = Municipality::find($r->input('municipalityID'));
        $municipality->municipalityName = $r->input('municipality_name');
        $municipality->provinceID = $r->input('provinceID');
        $municipality->status = $r->input('stat');
        $municipality->save();
        return redirect('municipality');
    }

    public function delete(Request $r)
    {

        $municipality = Municipality::find($r->input('municipalityID'));
        $municipality->archive = true;
        $municipality->save();
        return redirect('municipality');
    }
}
