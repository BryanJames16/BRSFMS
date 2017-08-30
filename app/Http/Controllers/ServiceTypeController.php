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
        if ($r->ajax()) {
            try {
                $stat = 0;
                $this->validate($r, [
                    'typeName' => 'required|unique:servicetypes|max:20',
                ]);

                if($r->input('status') == "active") {
                    $stat = 1;
                }
                else if($r->input('status') == "inactive") {
                    $stat = 0;
                }
                else {

                }        

                $insertRet = ServiceType::insert(['typeName'=>trim($r -> typeName),
                                                    'archive' => 0,
                                                    'typeDesc' => $r -> typeDesc,
                                                    'status' => $stat]);
            } 
            catch (Exception $exp) {
                // Catch
            }


            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function refresh(Request $r) {
        if ($r -> ajax()) {
            return json_encode(ServiceType::where("archive", "!=", "1")->get());
        }
        else {
            return view('errors.403');
        }
    }

    public function getEdit(Request $r) {
        if($r->ajax()) {
            return response(ServiceType::find($r->typeID));
        }
        else {
            return view('errors.403');
        }
    }

    public function edit(Request $r) { 
        if ($r->ajax()) {
            $this->validate($r, [
                    'typeName' => ['required',  'max:20', Rule::unique('servicetypes')->ignore($r->input('typeID'), 'typeID')],
                ]);
                
            $type = ServiceType::find($r->input('typeID'));
            $type->typeName = $r->input('typeName');
            $type->typeDesc = $r->input('typeDesc');
            $type->status = $r->input('status');
            $type->save();

            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function delete(Request $r) {
        if ($r->ajax()) {
            $type = ServiceType::find($r->input('typeID'));
            $type->archive = true;
            $type->save();
            
            return back();
        }
        else {
            return view('errors.403');
        }
    }
}
