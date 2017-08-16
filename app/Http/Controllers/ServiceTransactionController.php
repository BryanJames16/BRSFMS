<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Service;
use \App\Models\Servicetype;
use \App\Models\Servicetransaction;
use \App\Models\Utility;
use \App\Models\Resident;
use \App\Models\Participant;
use Carbon\Carbon;

require_once(app_path() . '/Includes/pktool.php');

use StaticCounter;
use SmartMove;

class ServiceTransactionController extends Controller
{
   public function index() {
 
        $residents = Resident::select('residentPrimeID','residentID', 'firstName','lastName','middleName','suffix', 'status', 'contactNumber', 'gender', 'birthDate', 'civilStatus','seniorCitizenID','disabilities', 'residentType')
    												-> where('status','1')
                                                    -> get();

        $servicetransactions= \DB::table('servicetransactions') ->select('serviceTransactionPrimeID',
                                                    'serviceTransactionID', 'servicetransactions.serviceName as serviceTransactionName',
                                                     'servicetransactions.servicePrimeID',
                                                    'fromAge', 'toAge','fromDate','toDate',
                                                     'servicetransactions.status','services.serviceName') 
                                        ->join('services', 'servicetransactions.servicePrimeID', '=', 'services.primeID')
                                        ->where('servicetransactions.archive','0')
                                        ->get();
        $services = Service::select('primeID','serviceID', 'serviceName')
    												-> where('archive','0')
                                                    -> where('status','1')
                                                    -> get();

        return view('service-transaction')
                                            ->with('servicetransactions', $servicetransactions)
                                            ->with('residents', $residents)
                                            ->with('services', $services);
    }

    public function notParticipant($id)
    {
        

        
            $mem = Participant::select('residentID')
                                -> where('serviceTransactionPrimeID','=',$id)
                                ->get();

            

            return json_encode(\DB::table('residents') ->select('residentPrimeID','residentID', 'firstName','lastName','middleName','suffix', 'status', 'contactNumber', 'gender', 'birthDate', 'civilStatus','seniorCitizenID','disabilities', 'residentType')
                                                    -> whereNotIn('residentPrimeID',$mem)
                                                    -> get());
        
    }

    public function getParticipant($id)
    {
        

        
            $mem = Participant::select('residentID')
                                -> where('serviceTransactionPrimeID','=',$id)
                                ->get();

            

            return json_encode(\DB::table('residents') ->select('residentPrimeID','residentID', 'firstName','lastName','middleName','suffix', 'status', 'contactNumber', 'gender', 'birthDate', 'civilStatus','seniorCitizenID','disabilities', 'residentType')
                                                    -> whereIn('residentPrimeID',$mem)
                                                    -> get());
        
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

    public function addParticipant(Request $r)
    {
         $aa = Participant::insert(['serviceTransactionPrimeID' => $r -> input('serviceTransactionPrimeID'),
                                            'residentID' => $r -> input('residentID'),
                                            'dateRegistered' => Carbon::now()]);
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
                                        -> where('servicetransactions.archive','0')
                                        ->get());
        }
    }

    public function nextPK(Request $r) {
        if ($r->ajax()) {


            $serviceTransactionPK = Utility::select('serviceRegPK')->get()->last();
            $serviceTransactionPKinc = StaticCounter::smart_next($serviceTransactionPK->serviceRegPK, SmartMove::$NUMBER);
            $lastServiceTransactionID = Servicetransaction::all()->last();
            
            if(is_null($lastServiceTransactionID))
            {
                return response($serviceTransactionPKinc);
            }
            else
            {
                $check = Servicetransaction::select('serviceTransactionID')->where([
                                                                ['serviceTransactionID','=',$serviceTransactionPKinc]
                                                                ])->get();
                if($check=='[]')
                {  
                    return response($serviceTransactionPKinc); 
                }
                else
                {
                    $nextValue = StaticCounter::smart_next($lastServiceTransactionID->serviceTransactionID, SmartMove::$NUMBER);
                    return response($nextValue); 
                }
            }
        }
    }

    public function getEdit(Request $r) {

       if($r->ajax())
        {
            return json_encode(\DB::table('servicetransactions') ->select('serviceTransactionPrimeID','serviceTransactionID','servicetransactions.serviceName as serviceTransactionName',
                                                                'servicePrimeID','fromAge','toAge', 'fromDate', 
                                                                'toDate', 'servicetransactions.status', 'servicetransactions.archive','services.serviceName')
                                        ->join('services', 'servicetransactions.servicePrimeID', '=', 'services.primeID') 
                                        ->where('serviceTransactionPrimeID', '=', $r->input('serviceTransactionPrimeID'))
                                        ->where('servicetransactions.archive','=',0)
                                        ->get());
        }

    }

    public function update(Request $r)
    {
        $type = Servicetransaction::find($r->input('serviceTransactionPrimeID'));
        $type->serviceTransactionID = $r->input('serviceTransactionID');
        $type->serviceName = $r->input('serviceName');
        $type->servicePrimeID = $r->input('servicePrimeID');
        $type->fromAge = $r->input('fromAge');
        $type->toAge = $r->input('toAge');
        $type->fromDate = $r->input('fromDate');
        $type->toDate = $r->input('toDate');
        $type->save();
    }

    public function delete(Request $r)
    {
        $type = Servicetransaction::find($r->input('serviceTransactionPrimeID'));
        $type->archive = 1;
        $type->save();
    }

    public function deletePart(Request $r)
    {
        $participants = \DB::table('participants')
                        ->where('residentID', '=', $r->input('residentID'))
                        ->where('serviceTransactionPrimeID', '=', $r->input('serviceTransactionPrimeID'))
                        ->delete();
    }

}
