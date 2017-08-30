<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Street;
use \Illuminate\Validation\Rule;


class StreetController extends Controller
{
   public function index() {
 
        $streets= \DB::table('streets') ->select('streetID', 'streetName', 'status') 
                                        ->where('archive', '=', 0) 
                                        ->get();
        
        return view('street') -> with('streets', $streets);
    }

    public function store(Request $r) {

        $this->validate($r, [
            
            'streetName' => 'required|unique:streets|max:30',
            
            ]);

        if($_POST['stat']=="active")
        {
            $stat = 1;
        }
        else if($_POST['stat']=="inactive")
        {
            $stat = 0;
        }

            
        $aah = Street::insert(['streetName'=>trim($r->streetName),
                                               'archive'=>0,
                                               'status'=>$stat]);
       return back();
             
        }

    public function getEdit(Request $r) {
        
        if($r->ajax())
        {
            return response(Street::find($r->streetID));
        }


    }

    public function edit(Request $r)
    {

        $this->validate($r, [
            
            'streetName' => ['required',  'max:30', Rule::unique('streets')->ignore($r->input('streetID'), 'streetID')],
            
            ]);

        $street = Street::find($r->input('streetID'));
        $street->streetName = $r->input('streetName');
        $street->status = $r->input('stat');
        $street->save();
        return redirect('street');
    }

    public function delete(Request $r)
    {
        
        $street = Street::find($r->input('streetID'));
        $street->archive = true;
        $street->save();
        return redirect('street');
        
    }
}
