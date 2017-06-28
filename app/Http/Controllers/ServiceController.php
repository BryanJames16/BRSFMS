<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Service;
use \App\Models\Servicetype;

class ServiceController extends Controller
{
   public function index() {
 
        $services= \DB::table('services') ->select('primeID','serviceID', 'serviceName', 'serviceDesc', 'typeName', 'services.status', 'services.typeID') 
                                        ->join('SERVICETYPES', 'SERVICES.typeID', '=', 'SERVICETYPES.typeID')
                                        ->where('services.archive', '=', 0) 
                                        ->get();

        return view('service',['types'=>ServiceType::where([['status', 1],['archive', 0]])->pluck('typeName', 'typeID')]) -> with('services', $services);
    }

    public function store(Request $r) {

        
        $this->validate($r, [
            
            'serviceID' => 'required|unique:services|max:20',
            'serviceName' => 'required|max:30',
            ]);

        if($_POST['stat']=="active")
        {
            $stat = 1;
        }
        else if($_POST['stat']=="inactive")
        {
            $stat = 0;
        }

        $aah = Service::insert(['serviceID'=>trim($r->serviceID),
                                            'serviceName'=>trim($r->serviceName),
                                            'serviceDesc'=>trim($r->desc),
                                            'typeID'=>$r->typeID,
                                               'archive'=>0,
                                               'status'=>$stat]);
            return back();
        }

    public function getEdit(Request $r) {
        
        if($r->ajax())
        {
            return response(Service::find($r->primeID));
        }


    }

    public function edit(Request $r)
    {

        $service = Service::find($r->input('primeID'));
        $service->serviceName = $r->input('service_name');
        $service->serviceDesc = $r->input('service_desc');
        $service->typeID = $r->input('typeID');
        $service->status = $r->input('stat');
        $service->save();
        return redirect('service');
    }

    public function delete(Request $r)
    {

        $service = Service::find($r->input('primeID'));
        $service->archive = true;
        $service->save();
        return redirect('service');
    }

}
