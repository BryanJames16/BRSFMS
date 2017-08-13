<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Requirement;
use \App\Models\Document;

class RequirementController extends Controller
{
   public function index() {
 
        $requirements= \DB::table('requirements') ->select('requirementID','requirementName', 'requirementDesc','status','archive')
                                        ->where('archive', '=', 0) 
                                        ->get();

        return view('requirement')-> with('requirements', $requirements);
    }

    public function store(Request $r) {
        $stat = 0;
        
        $this->validate($r, [
            'serviceID' => 'required|unique:services|max:20',
            'serviceName' => 'required|max:30',
        ]);

        if($r->input('status') == "active")
        {
            $stat = 1;
        }
        else if($r->input('status') == "inactive")
        {
            $stat = 0;
        }
        else
        {

        }

        $aah = Service::insert(['serviceID'=>trim($r->serviceID),
                                            'serviceName'=>trim($r->serviceName),
                                            'serviceDesc'=>trim($r->serviceDesc),
                                            'typeID'=>$r->typeID,
                                               'archive'=>0,
                                               'status'=>$stat]);
        return back();
    }

    public function refresh(Request $r) {
        if ($r -> ajax()) {
            $services = \DB::table('services') ->select('primeID','serviceID', 'serviceName', 'serviceDesc', 'typeName', 'services.status', 'services.typeID') 
                                        ->join('SERVICETYPES', 'SERVICES.typeID', '=', 'SERVICETYPES.typeID')
                                        ->where('services.archive', '=', 0) 
                                        ->get();

            return json_encode($services);
        }
    }

    public function getEdit(Request $r) {
        
        if($r->ajax())
        {
            return response(Service::find($r->input('primeID')));
        }

    }

    public function edit(Request $r)
    {

        $service = Service::find($r->input('primeID'));
        $service->serviceName = $r->input('serviceName');
        $service->serviceDesc = $r->input('serviceDesc');
        $service->typeID = $r->input('typeID');
        $service->status = $r->input('status');
        $service->save();
        return back();
    }

    public function delete(Request $r)
    {

        $service = Service::find($r->input('primeID'));
        $service->archive = true;
        $service->save();
        return back();
    }

}
