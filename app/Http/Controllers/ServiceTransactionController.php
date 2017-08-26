<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Service;
use \App\Models\Servicetype;
use \App\Models\Servicetransaction;
use \App\Models\Utility;
use \App\Models\Resident;
use \App\Models\Participant;
use \App\Models\Recipient;
use \App\Models\Partrecipient;
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
                                        ->get();
        $services = Service::select('primeID','serviceID', 'serviceName')
    												-> where('archive','0')
                                                    -> where('status','1')
                                                    -> get();
        

        return view('service-transaction',['recipients' => 
                                    Recipient::where([
                                                        ['status', 1], 
                                                        ['archive', 0]
                                                    ]) 
                                                    -> pluck('recipientName', 'recipientID')])
                                            ->with('servicetransactions', $servicetransactions)
                                            ->with('residents', $residents)
                                            ->with('services', $services);
    }

    public function notParticipant($id) {
        $mem = Participant::select('residentID')
                            -> where('serviceTransactionPrimeID','=',$id)
                            ->get();

        

        return json_encode(\DB::table('residents')->select('residentPrimeID', 'residentID', 
                                                            'firstName', 'lastName', 'middleName', 
                                                            'suffix', 'status', 'contactNumber', 
                                                            'gender', 'birthDate', 'civilStatus', 
                                                            'seniorCitizenID', 'disabilities', 
                                                            'residentType')
                                                -> whereNotIn('residentPrimeID',$mem)
                                                -> get());
    }

    public function getParticipant($id) {
        $mem = Participant::select('residentID')
                            -> where('serviceTransactionPrimeID','=',$id)
                            ->get();

        return json_encode(\DB::table('residents') ->select('residentPrimeID', 'residentID', 
                                                            'firstName', 'lastName', 'middleName', 
                                                            'suffix', 'status', 'contactNumber', 
                                                            'gender', 'birthDate', 'civilStatus', 
                                                            'seniorCitizenID', 'disabilities', 
                                                            'residentType')
                                                -> whereIn('residentPrimeID',$mem)
                                                -> get());
    }

    public function store(Request $r) {
        if ($r->ajax()) {
            $insertRet = Servicetransaction::insert(['serviceTransactionID' => $r -> input('serviceTransactionID'),
                                                'serviceName' => $r -> input('serviceName'),
                                                'servicePrimeID' => $r -> input('servicePrimeID'),
                                                'fromAge' => $r -> input('fromAge'),
                                                'toAge' => $r -> input('toAge'),
                                                'toDate' => $r -> input('toDate'),
                                                'fromDate' => $r -> input('fromDate')]);

            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function storeNoAge(Request $r) {
        if ($r->ajax()) {
            $insertRet = Servicetransaction::insert(['serviceTransactionID' => $r -> input('serviceTransactionID'),
                                                'serviceName' => $r -> input('serviceName'),
                                                'servicePrimeID' => $r -> input('servicePrimeID'),
                                                'toDate' => $r -> input('toDate'),
                                                'fromDate' => $r -> input('fromDate')]);

            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function storeAge(Request $r) {
        if ($r->ajax()) {
            $insertRet = Servicetransaction::insert(['serviceTransactionID' => $r -> input('serviceTransactionID'),
                                                'serviceName' => $r -> input('serviceName'),
                                                'servicePrimeID' => $r -> input('servicePrimeID'),
                                                'fromAge' => $r -> input('fromAge'),
                                                'toAge' => $r -> input('toAge'),
                                                'fromDate' => $r -> input('fromDate')]);

            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function storeNo(Request $r) {
        if ($r->ajax()) {
            $insertRet = Servicetransaction::insert(['serviceTransactionID' => $r -> input('serviceTransactionID'),
                                                'serviceName' => $r -> input('serviceName'),
                                                'servicePrimeID' => $r -> input('servicePrimeID'),
                                                'fromDate' => $r -> input('fromDate')]);

            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function addParticipant(Request $r) {
        if ($r->ajax()) {
            $insertRet = Participant::insert(['serviceTransactionPrimeID' => $r -> input('serviceTransactionPrimeID'),
                                                'residentID' => $r -> input('residentID'),
                                                'dateRegistered' => Carbon::now()]);
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function refresh(Request $r) {
        if ($r -> ajax()) {
            return json_encode(\DB::table('servicetransactions') ->select('servicetransactions.serviceTransactionPrimeID',
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
                                        ->get());
        }
        else {
            return view('errors.403');
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
        else {
            return view('errors.403');
        }
    }

    public function getEdit(Request $r) {
        if ($r->ajax()) {
            return json_encode(\DB::table('servicetransactions') ->select('serviceTransactionPrimeID','serviceTransactionID','servicetransactions.serviceName as serviceTransactionName',
                                                                'servicePrimeID','fromAge','toAge', 'fromDate', 
                                                                'toDate', 'servicetransactions.status', 'servicetransactions.archive','services.serviceName')
                                        ->join('services', 'servicetransactions.servicePrimeID', '=', 'services.primeID') 
                                        ->where('serviceTransactionPrimeID', '=', $r->input('serviceTransactionPrimeID'))
                                        ->where('servicetransactions.archive','=',0)
                                        ->get());
        }
        else {
            return view('errors.403');
        }
    }

    public function getResident(Request $r) {
        if ($r->ajax()) {
            return json_encode(\DB::table('residents')->select('residentPrimeID','imagePath','residentID', 'firstName','lastName','middleName','suffix', 'status', 'contactNumber', 'gender', 'birthDate', 'civilStatus','seniorCitizenID','disabilities', 'residentType')
    												-> where('status','1')
                                                    -> where('residentPrimeID',$r->input('residentPrimeID'))
                                                    -> get());
        }
        else {
            return view('errors.403');
        }
    }

    public function getParticipantID(Request $r) {
        if ($r->ajax()) {
            return json_encode(\DB::table('participants')->select('participantID')
    												-> where('serviceTransactionPrimeID','=',$r->input('serviceTransactionPrimeID'))
                                                    -> where('residentID',$r->input('residentID'))
                                                    -> get());
        }
        else {
            return view('errors.403');
        }
    }

    public function getRecipients(Request $r) {
        if ($r->ajax()) {
            return json_encode( \DB::table('partrecipients')
                                    ->select('partrecipientID','quantity','recipientName','quantity','recipients.recipientID')
                                        ->join('recipients', 'partrecipients.recipientID', '=', 'recipients.recipientID')
                                        ->join('participants', 'partrecipients.participantID', '=', 'participants.participantID')
                                        -> where('recipients.status','1')
                                        -> where('recipients.archive','0')
                                        -> where('participants.residentID','=',$r->input('residentPrimeID'))
                                        -> where('participants.serviceTransactionPrimeID','=',$r->input('serviceTransactionPrimeID'))
                                        -> get());
        }
        else {
            return view('errors.403');
        }
    }

    public function fillRecipients(Request $r) {
        if ($r->ajax()) {
            return json_encode( \DB::table('recipients')
                                    ->select('recipientID','recipientName')
                                        ->join('recipients', 'partrecipients.recipientID', '=', 'recipients.recipientID')
                                        ->join('participants', 'partrecipients.participantID', '=', 'participants.participantID')
                                        -> where('recipients.status','1')
                                        -> where('recipients.archive','0')
                                        -> where('participants.residentID','=',$r->input('residentPrimeID'))
                                        -> where('participants.serviceTransactionPrimeID','=',$r->input('serviceTransactionPrimeID'))
                                        -> get());
        }
        else {
            return view('errors.403');
        }
    }



    public function update(Request $r) {
        if ($r->ajax()) {
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
        else {
            return view('errors.403');
        }
    }

    public function updateStatus(Request $r) {
        if ($r->ajax()) {
            $type = Servicetransaction::find($r->input('serviceTransactionPrimeID'));
            $type->status = 'On-going';
            $type->save();
        }
        else {
            return view('errors.403');
        }
    }

    public function finishStatus(Request $r) {
        if ($r->ajax()) {
            $type = Servicetransaction::find($r->input('serviceTransactionPrimeID'));
            $type->status = 'Finished';
            $type->save();
        }
        else {
            return view('errors.403');
        }
    }

    public function delete(Request $r) {
        if ($r->ajax()) {
            $type = Servicetransaction::find($r->input('serviceTransactionPrimeID'));
            $type->archive = 1;
            $type->save();
        }
        else {
            return view('errors.403');
        }
    }

    public function deletePart(Request $r) {
        if ($r->ajax()) {
            $participants = \DB::table('participants')
                            ->where('residentID', '=', $r->input('residentID'))
                            ->where('serviceTransactionPrimeID', '=', $r->input('serviceTransactionPrimeID'))
                            ->delete();
        }
        else {
            return view('errors.403');
        }
    }


}
