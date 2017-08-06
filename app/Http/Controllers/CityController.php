<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\City;
use \App\Models\Province;

class CityController extends Controller
{
   public function index() {
 
        $cities= \DB::table('cities') ->select('cityID', 'cityName', 'provinceName', 'cities.status', 'cities.provinceID') 
                                        ->leftJoin('PROVINCES', 'CITIES.provinceID', '=', 'PROVINCES.provinceID')
                                        ->where('cities.archive', '=', 0) 
                                        ->get();
        
        return view('city',['types'=>Province::where([['status', 1],['archive', 0]])->pluck('provinceName', 'provinceID')]) -> with('cities', $cities);
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
            
            $aah = City::insert(['cityName'=>$r->name,
                                            'provinceID'=>$r->provinceID,
                                               'archive'=>0,
                                               'status'=>$stat]);
            return back();
             
        }
        else
        {
            
            $aah = City::insert(['cityName'=>$r->name,
                                               'archive'=>0,
                                               'status'=>$stat]);
            return back();  
            
        }


        
        }

    public function getEdit(Request $r) {
        
        if($r->ajax())
        {
            return response(City::find($r->cityID));
        }


    }

    public function edit(Request $r)
    {

        $city = City::find($r->input('cityID'));
        $city->cityName = $r->input('city_name');
        $city->provinceID = $r->input('provinceID');
        $city->status = $r->input('stat');
        $city->save();
        return redirect('city');
    }

    public function delete(Request $r)
    {
        
        $city = City::find($r->input('cityID'));
        $city->archive = true;
        $city->save();
        return redirect('city');
        
    }
}
