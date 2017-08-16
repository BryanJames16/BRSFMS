<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\City;
use \App\Models\Municipality;
use \App\Models\Barangay;

class BarangayController extends Controller
{
   public function index() {
 
        $barangays= \DB::table('barangays') ->select('barangayID', 'barangayName','status') 
                                        ->where('archive', '=', 0) 
                                        ->get();

        
        return view('barangay') -> with('barangays', $barangays);
    }

    public function store(Request $r) {

        if ($r->ajax()) {
            $this->validate($r, [
                
                'barangayName' => 'required|unique:barangays|max:40',
                ]);

            if($_POST['stat']=="active")
            {
                $stat = 1;
            }
            else if($_POST['stat']=="inactive")
            {
                $stat = 0;
            }

            
            $aah = Barangay::insert(['barangayName'=>trim($r->barangayName),
                                                'archive'=>0,
                                                'status'=>$stat]);
            return back();
        }
        else {
            return view('errors.403');
        }
        
    }

    public function getEdit(Request $r) {
        
        if($r->ajax()) {
            return response(Barangay::find($r->barangayID));
        }
        else {
            return view('errors.403');
        }

    }

    public function edit(Request $r) {
        if ($r->ajax()) {
            $barangay = Barangay::find($r->input('barangayID'));
            $barangay->barangayName = $r->input('barangay_name');
            $barangay->status = $r->input('stat');
            $barangay->save();
            return redirect('barangay');
        }
        else {
            return view('errors.403');
        }
    }

    public function delete(Request $r) {

        $barangay = Barangay::find($r->input('barangayID'));
        $barangay->archive = true;
        $barangay->save();
        return redirect('barangay');
    }
}
