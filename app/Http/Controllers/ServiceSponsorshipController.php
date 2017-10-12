<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Service;
use \App\Models\Servicetype;
use \App\Models\Servicetransaction;
use \App\Models\Utility;
use \App\Models\Resident;
use \App\Models\Participant;
use \App\Models\Sponsor;
use \App\Models\Recipient;
use \App\Models\Partrecipient;
use Carbon\Carbon;
use \App\Models\Log;
use Illuminate\Support\Facades\Auth;

require_once(app_path() . '/Includes/pktool.php');

use StaticCounter;
use SmartMove;

class ServiceSponsorshipController extends Controller
{
   public function index() {
 

        $servicetransactions= \DB::table('servicetransactions') ->select('servicetransactions.serviceTransactionPrimeID',
                                                    'serviceTransactionID', 'servicetransactions.serviceName as serviceTransactionName',
                                                     'servicetransactions.servicePrimeID',
                                                    'fromAge', 'toAge','fromDate','toDate',
                                                     'servicetransactions.status','services.serviceName',\DB::raw('count(participantID) as number')) 
                                        ->leftjoin('participants','participants.serviceTransactionPrimeID','=','servicetransactions.serviceTransactionPrimeID')
                                        ->join('services', 'servicetransactions.servicePrimeID', '=', 'services.primeID')
                                        ->groupBy('serviceTransactionPrimeID')
                                        ->groupBy('serviceTransactionID')
                                        ->groupBy('serviceTransactionName')
                                        ->groupBy('servicetransactions.servicePrimeID')
                                        ->groupBy('fromAge')
                                        ->groupBy('toAge')
                                        ->groupBy('fromDate')
                                        ->groupBy('toDate')
                                        ->groupBy('servicetransactions.status')
                                        ->groupBy('services.serviceName')
                                        ->where('servicetransactions.archive','0')
                                        ->where('servicetransactions.status','!=','On-going')
                                        ->where('servicetransactions.status','!=','Finished')
                                        ->get();
        $services = Service::select('primeID','serviceID', 'serviceName')
    												-> where('archive','0')
                                                    -> where('status','1')
                                                    -> get();
        

        return view('service-sponsorship')->with('servicetransactions', $servicetransactions)
                                          ->with('services', $services);
    }

    public function getResidents(Request $r){
        if ($r -> ajax()) {
            
            $residents = Resident::select('residentPrimeID','imagePath','residentID', 'firstName','lastName','middleName','suffix', 'status', 'contactNumber', 'gender', 'birthDate', 'civilStatus','seniorCitizenID','disabilities', 'residentType')
    												-> where('status','1')
                                                    -> get();
            return json_encode($residents);
        }
        else{
            return view('errors.403');
        }
        

    }

    public function getResidentInfo(Request $r){
        if ($r -> ajax()) {
            
            $residents = Resident::select('residentPrimeID','imagePath','residentID', 'firstName','lastName','middleName','suffix', 'status', 'contactNumber', 'gender', 'birthDate', 'civilStatus','seniorCitizenID','disabilities', 'residentType')
    												-> where('status','1')
                                                    -> where('residentPrimeID',$r->input('residentPrimeID'))
                                                    -> get();
            return json_encode($residents);
        }
        else{
            return view('errors.403');
        }
        

    }

    public function sponsor(Request $r) {
        if ($r->ajax()) {

            $insertRet = Sponsor::insert(['resiID'=>trim($r -> input('resiID')),
                                                'sID' => trim($r -> input('sID')),
                                                'firstName' => trim($r -> input('firstName')),
                                                'middleName' => trim($r -> input('middleName')),
                                                'lastName' => $r -> input('lastName'),
                                                'dateSponsored' => Carbon::now(),
                                                'contactNumber' => $r -> input('contactNumber'),
                                                'email' => $r -> input('email')]);

            

            return back();



        }
        else {
            return view('errors.403');
        }
    }
}
