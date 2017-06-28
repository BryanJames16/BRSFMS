<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Servicetype;
use \Illuminate\Validation\Rule;

class ServiceTypeController extends Controller
{
   public function index() {
        $serviceTypes = ServiceType::select('typeID', 'typeName', 'typeDesc', 'status')
                                                    -> where([
                                                                ['archive', '=', 0]
                                                                ])
                                                    -> get();

        return view('service-type') -> with('serviceTypes', $serviceTypes);
    }

    public function store(Request $r) {

        $this->validate($r, [
            
            'typeName' => 'required|unique:servicetypes|max:20',
            ]);

        if($_POST['stat']=="active")
        {
            $stat = 1;
        }
        else if($_POST['stat']=="inactive")
        {
            $stat = 0;
        }

        $aah = ServiceType::insert(['typeName'=>trim($r->typeName),
                                               'archive'=>0,
                                               'typeDesc'=>$r->desc,
                                               'status'=>$stat]);


        return back();
    }

    public function getEdit(Request $r) {
        
        if($r->ajax())
        {
            return response(ServiceType::find($r->typeID));
        }


    }

    public function edit(Request $r)
    {

        $type = ServiceType::find($r->input('type_ID'));
        $type->typeName = $r->input('typeName');
        $type->typeDesc = $r->input('type_desc');
        $type->status = $r->input('stat');
        $type->save();
        return redirect('service-type');
    }

    public function delete(Request $r)
    {

        $type = ServiceType::find($r->input('typeID'));
        $type->archive = true;
        $type->save();
        return redirect('service-type');
    }
}
