<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Resident;
use \App\Models\Servicetransaction;
use Carbon\Carbon;
use PDF;

class ReportsParticipantController extends Controller
{
    public function index() {
        
        $services = Servicetransaction::where('status','Finished')
                                        ->where('archive','0')
                                        ->get();
        
        return view('report-participant')->with('services',$services);
    }

    public function preview($id) {
        $services= \DB::table('servicetransactions')
                                        ->join('participants',' servicetransactions.serviceTransactionPrimeID','=','participants.serviceTransactionPrimeID')
                                        ->where('participants.serviceTransactionPrimeID','10')
                                        ->get();
        $name= \DB::table('servicetransactions')->where('serviceTransactionPrimeID','10')
                                        ->get()
                                        ->last();

        return view('pdfparticipant')
                        ->with('services',$services)
                        ->with('name',$name);
    }

    


    public function print(Request $r){

        $fromDate =  $r->input('fromDate');
        $toDate =  $r->input('toDate');


        $servicesNoRecipient= \DB::table('servicetransactions') ->select('servicetransactions.serviceTransactionPrimeID',
                                                    'serviceTransactionID', 'servicetransactions.serviceName as serviceTransactionName',
                                                     'servicetransactions.servicePrimeID',
                                                    'fromAge', 'toAge','fromDate','toDate',
                                                     'servicetransactions.status','services.serviceName',\DB::raw('count(participantID) as participant')) 
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
                                        ->whereBetween('fromDate',[$fromDate,$toDate])
                                        ->orWhereBetween('toDate',[$fromDate,$toDate])
                                        ->orderBy('fromDate','desc')
                                        ->get();
        

        $total = Servicetransaction::where('archive','0')
                                    ->where('status','Finished')
                                    ->whereBetween('fromDate',[$fromDate,$toDate])
                                    ->orWhereBetween('toDate',[$fromDate,$toDate])
                                    ->count();

        $recipient = Servicetransaction::select('servicetransactions.serviceTransactionPrimeID',\DB::raw('count(partrecipientID) as recipient'))
                                    ->leftjoin('participants','participants.serviceTransactionPrimeID','=','servicetransactions.serviceTransactionPrimeID')
                                    ->join('partrecipients', 'participants.participantID', '=', 'partrecipients.participantID')
                                    ->groupBy('serviceTransactionPrimeID')
                                    ->where('servicetransactions.archive','0')
                                    ->whereBetween('fromDate',[$r->input('fromDate'),$r->input('toDate')])
                                    ->orWhereBetween('toDate',[$r->input('fromDate'),$r->input('toDate')])
                                    ->where('status','Finished')
                                    ->get();

        
        $totalPart = 0;
        $totalRec = 0;

        foreach($recipient as $rec){
            $totalRec += $rec->recipient; 
        }

        foreach($servicesNoRecipient as $ser){
            $totalPart += $ser->participant;
        }

        

        $pdf = PDF::loadView('pdfservice',compact('fromDate','toDate','totalPart','totalRec','servicesNoRecipient','total','recipient'))
                        ->setPaper('a4','landscape')
                        ->setOptions(['defaultFont' => 'sans-serif']);
        
        
        return $pdf->download('Report-RenderedServices.pdf');

        return back();
    }




}
