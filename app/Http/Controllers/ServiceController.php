<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Service;
use \App\Models\Servicetype;
use \Illuminate\Validation\Rule;

class ServiceController extends Controller
{
   public function index() {
        $services= \DB::table('services') ->select('primeID','serviceID', 'serviceName', 'serviceDesc', 'typeName', 'services.status', 'services.typeID') 
                                        ->join('SERVICETYPES', 'SERVICES.typeID', '=', 'SERVICETYPES.typeID')
                                        ->where('services.archive', '=', 0) 
                                        ->get();

        return view('service', ['types' => 
                                    ServiceType::where([
                                                        ['status', 1], 
                                                        ['archive', 0]
                                                    ]) 
                                                    -> pluck('typeName', 'typeID')]) 
                                                    -> with('services', $services);
    }

    public function store(Request $r) {
        if ($r->ajax()) {
            $stat = 0;
            
            $this->validate($r, [
                'serviceID' => 'required|unique:services|max:20',
                'serviceName' => 'required|max:30',
            ]);

            if($r->input('status') == "active") {
                $stat = 1;
            }
            else if($r->input('status') == "inactive") {
                $stat = 0;
            }
            else {

            }

            $insertRet = Service::insert(['serviceID'=>trim($r->serviceID),
                                                'serviceName'=>trim($r->serviceName),
                                                'serviceDesc'=>trim($r->serviceDesc),
                                                'typeID'=>$r->typeID,
                                                'archive'=>0,
                                                'status'=>$stat]);
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function refresh(Request $r) {
        if ($r -> ajax()) {
            $services = \DB::table('services') ->select('primeID','serviceID', 'serviceName', 'serviceDesc', 'typeName', 'services.status', 'services.typeID') 
                                        ->join('SERVICETYPES', 'SERVICES.typeID', '=', 'SERVICETYPES.typeID')
                                        ->where('services.archive', '=', 0) 
                                        ->get();

            return json_encode($services);
        }
        else {
            return view('errors.403');
        }
    }

    public function getEdit(Request $r) {
        if($r->ajax()) {
            return response(Service::find($r->input('primeID')));
        }
        else {
            return view('errors.403');
        }
    }

    public function edit(Request $r) {
        if ($r->ajax()) {

            $this->validate($r, [
                'serviceName' => ['required',  'max:30', Rule::unique('services')->ignore($r->input('primeID'), 'primeID')],
            ]);

            $service = Service::find($r->input('primeID'));
            $service->serviceName = $r->input('serviceName');
            $service->serviceDesc = $r->input('serviceDesc');
            $service->typeID = $r->input('typeID');
            $service->status = $r->input('status');
            $service->save();
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function delete(Request $r) {
        if ($r->ajax()) {
            $service = Service::find($r->input('primeID'));
            $service->archive = true;
            $service->save();
            return back();
        }
        else {
            return view('errors.403');
        }
    }

}
