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
use \App\Models\Sponsoritem;
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
                                                     'servicetransactions.status','services.serviceName',\DB::raw('count(sponsorID) as number')) 
                                        ->leftjoin('sponsors','sponsors.sID','=','servicetransactions.serviceTransactionPrimeID')
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

    public function refresh(Request $r) {
        if ($r -> ajax()) {
            return json_encode(\DB::table('servicetransactions') ->select('servicetransactions.serviceTransactionPrimeID',
                                                    'serviceTransactionID', 'servicetransactions.serviceName as serviceTransactionName',
                                                     'servicetransactions.servicePrimeID',
                                                    'fromAge', 'toAge','fromDate','toDate',
                                                     'servicetransactions.status','services.serviceName',\DB::raw('count(sponsorID) as number')) 
                                        ->leftjoin('sponsors','sponsors.sID','=','servicetransactions.serviceTransactionPrimeID')
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
                                        ->get());
        }
        else {
            return view('errors.403');
        }
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

            $insertRet = Sponsor::insert(['resiID'=>$r -> input('resiID'),
                                                'sID' => $r -> input('sID'),
                                                'firstName' => $r -> input('firstName'),
                                                'middleName' => $r -> input('middleName'),
                                                'lastName' => $r -> input('lastName'),
                                                'dateSponsored' => Carbon::now(),
                                                'contactNumber' => $r -> input('contactNumber'),
                                                'email' => $r -> input('email')]);

            $findRet = Sponsor::all() -> last();
            
            $id = $findRet-> sponsorID;

            return ($id);

        }
        else {
            return view('errors.403');
        }
    }

    public function sponsorItem(Request $r) {
        if ($r->ajax()) {

            $insertRet = Sponsoritem::insert(['sponsorID'=>$r -> input('sponsorID'),
                                                'itemName' => $r -> input('itemName'),
                                                'quantity' => $r -> input('quantity')]);


        }
        else {
            return view('errors.403');
        }
    }
}
