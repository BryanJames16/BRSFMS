<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Service;
use \App\Models\Servicetransaction;
use Carbon\Carbon;

require_once(app_path() . '/Includes/pktool.php');

use StaticCounter;
use SmartMove;

class QueryServiceController extends Controller
{

    

    public function index() {
    	$service = Service::select('primeID','serviceName')
    												-> where('status','1')
                                                    -> where('archive','0')
                                                    -> get();
        

    	return view('query-service')
                                -> with('service',$service);
    }


    public function getQuery(Request $r) {
        if ($r -> ajax()) {
            return json_encode(\DB::table('servicetransactions') ->select('servicetransactions.serviceTransactionPrimeID',
                                                    'serviceTransactionID', 'servicetransactions.serviceName as serviceTransactionName',
                                                     'servicetransactions.servicePrimeID',
                                                    'fromAge', 'toAge','fromDate','toDate',
                                                     'servicetransactions.status','services.serviceName') 
                                        ->join('services', 'servicetransactions.servicePrimeID', '=', 'services.primeID')
                                        ->where('servicetransactions.archive','0')
                                        ->where('servicetransactions.status','like','%'.$r->input('status').'%')
                                        ->where('servicetransactions.servicePrimeID','like','%'.$r->input('service').'%')
                                        ->where('servicetransactions.serviceName','like','%'.$r->input('serviceName').'%')
                                        ->whereBetween('fromDate',[$r->input('fromDate'),$r->input('toDate')])
                                        ->orWhereBetween('toDate',[$r->input('fromDate'),$r->input('toDate')])
                                        ->get());
        }
        else {
            return view('errors.403');
        }

    }

  
}

