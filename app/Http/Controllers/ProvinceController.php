<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Province;

class ProvinceController extends Controller
{
    public function index() {
        $provinces = Province::select('provinceID', 'provinceName', 'provinceCode', 'status')
                                                    -> where([
                                                                ['archive', '=', 0]
                                                                ])
                                                    -> get();

        return view('province') -> with('provinces', $provinces);
    }

    public function store(Request $r)
    {
        if($_POST['stat']=="active")
        {
            $stat = 1;
        }
        else if($_POST['stat']=="inactive")
        {
            $stat = 0;
        }

        $aah = Province::insert(['provinceName'=>$r->name,
                                                'provinceCode'=>$r->code,
                                               'archive'=>0,
                                               'status'=>$stat]);
        return back();
    }

    public function getEdit(Request $r) 
    {
        
        if($r->ajax())
        {
            return response(Province::find($r->provinceID));
        }
    }

    public function edit(Request $r)
    {

        $province = Province::find($r->input('provinceID'));
        $province->provinceName = $r->input('name');
        $province->provinceCode = $r->input('code');
        $province->status = $r->input('stat');
        $province->save();
        return redirect('province');
    }

    public function delete(Request $r)
    {

        $province = Province::find($r->input('provinceID'));
        $province->archive = true;
        $province->save();
        return redirect('province');
    }
}
