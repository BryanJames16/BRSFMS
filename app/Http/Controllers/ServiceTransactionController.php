<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Service;
use \App\Models\Servicetype;
use \App\Models\Servicetransaction;


class ServiceTransactionController extends Controller
{
   public function index() {
 
        

        $servicetransactions= \DB::table('servicetransactions') ->select('serviceTransactionPrimeID',
                                                    'serviceTransactionID', 'servicetransactions.serviceName as serviceTransactionName',
                                                     'servicetransactions.servicePrimeID',
                                                    'fromAge', 'toAge','fromDate','toDate',
                                                     'servicetransactions.status','services.serviceName') 
                                        ->join('services', 'servicetransactions.servicePrimeID', '=', 'services.primeID')
                                        ->get();
        $services = Service::select('primeID','serviceID', 'serviceName')
    												-> where('archive','0')
                                                    -> where('status','1')
                                                    -> get();

        return view('service-transaction')
                                            ->with('servicetransactions', $servicetransactions)
                                            ->with('services', $services);
    }

    public function store(Request $r) {

        echo"
        <script>
            alert('HAHAHAHAHAH');
        </script>
        ";

        $aa = Servicetransaction::insert(['serviceTransactionID' => $r -> input('serviceTransactionID'),
                                            'serviceName' => $r -> input('serviceName'),
                                            'servicePrimeID' => $r -> input('servicePrimeID'),
                                            'fromAge' => $r -> input('fromAge'),
											'toAge' => $r -> input('toAge'),
                                            'toDate' => $r -> input('toDate'),
                                            'fromDate' => $r -> input('fromDate')]);

        return back();
    }

    public function refresh(Request $r) {
        if ($r -> ajax()) 
        {
            return json_encode(\DB::table('servicetransactions') ->select('serviceTransactionPrimeID',
                                                    'serviceTransactionID', 'servicetransactions.serviceName as serviceTransactionName',
                                                     'servicetransactions.servicePrimeID',
                                                    'fromAge', 'toAge','fromDate','toDate',
                                                     'servicetransactions.status','services.serviceName') 
                                        ->join('services', 'servicetransactions.servicePrimeID', '=', 'services.primeID')
                                        ->get());
        }
    }

    public function getEdit(Request $r) {
        
       
    }

    public function edit(Request $r)
    {

    }

    public function delete(Request $r)
    {

    }

}
