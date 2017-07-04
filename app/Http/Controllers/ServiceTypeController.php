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
        try {
            $this->validate($r, [
                'typeName' => 'required|unique:servicetypes|max:20',
            ]);

            $aah = ServiceType::insert(['typeName'=>trim($r -> typeName),
                                                'archive' => 0,
                                                'typeDesc' => $r -> typeDesc,
                                                'status' => $stat]);
        } catch (Exception $exp) {
            // echo "<script>console.log('Exception Caught!\\n' + " . $exp . ");</script>";
        }


        return back();
    }

    public function refresh(Request $r) {
        if ($r -> ajax()) {
            return json_encode(ServiceType::where("archive", "!=", "1")->get());
        }
    }

    public function getEdit(Request $r) {
        
        if($r->ajax())
        {
            return response(ServiceType::find($r->typeID));
        }


    }

    public function edit(Request $r)
    {

        if($r->input('status') == "active")
        {
            $stat = 0;
        }
        else if($r->input('status') == "inactive")
        {
            $stat = 1;
        }
        else
        {

        }        

        $type = ServiceType::find($r->input('typeID'));
        $type->typeName = $r->input('typeName');
        $type->typeDesc = $r->input('typeDesc');
        $type->status = $stat;
        $type->save();

        return back();
    }

    public function delete(Request $r)
    {

        $type = ServiceType::find($r->input('typeID'));
        $type->archive = true;
        $type->save();
        
        return back();
    }
}
