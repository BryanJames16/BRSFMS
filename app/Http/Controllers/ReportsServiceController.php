<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Resident;
use \App\Models\Servicetransaction;
use Carbon\Carbon;
use PDF;

class ReportsServiceController extends Controller
{
    public function index() {
        return view('report-service');
    }

    public function previewAll() {
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
                                        ->orderBy('fromDate','desc')
                                        ->get();
        

        $total = Servicetransaction::where('archive','0')
                                    ->where('status','Finished')
                                    ->count();

        $recipient = Servicetransaction::select('servicetransactions.serviceTransactionPrimeID',\DB::raw('count(partrecipientID) as recipient'))
                                    ->leftjoin('participants','participants.serviceTransactionPrimeID','=','servicetransactions.serviceTransactionPrimeID')
                                    ->join('partrecipients', 'participants.participantID', '=', 'partrecipients.participantID')
                                    ->groupBy('serviceTransactionPrimeID')
                                    ->where('servicetransactions.archive','0')
                                    ->where('status','Finished')
                                    ->get();

        $fromDate = null;
        $toDate = null;
        $totalPart = 0;
        $totalRec = 0;

        foreach($recipient as $rec){
            $totalRec += $rec->recipient; 
        }

        foreach($servicesNoRecipient as $ser){
            $totalPart += $ser->participant;
        }

        return view('preview.service')
                        ->with('fromDate',$fromDate)
                        ->with('toDate',$toDate) 
                        ->with('total',$total)  
                        ->with('totalRec',$totalRec)  
                        ->with('totalPart',$totalPart)  
                        ->with('recipient',$recipient)    
                        ->with('servicesNoRecipient',$servicesNoRecipient);
    }

    public function previewRange($fromDate,$toDate) {
        
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
                                    ->whereBetween('fromDate',[$fromDate,$toDate])
                                    ->orWhereBetween('toDate',[$fromDate,$toDate])
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

        return view('preview.service')
                        ->with('fromDate',$fromDate)
                        ->with('toDate',$toDate) 
                        ->with('total',$total)  
                        ->with('totalRec',$totalRec)  
                        ->with('totalPart',$totalPart)  
                        ->with('recipient',$recipient)    
                        ->with('servicesNoRecipient',$servicesNoRecipient);

        

    }

    public function printAll(){

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
                                        ->orderBy('fromDate','desc')
                                        ->get();
        

        $total = Servicetransaction::where('archive','0')
                                    ->where('status','Finished')
                                    ->count();

        $recipient = Servicetransaction::select('servicetransactions.serviceTransactionPrimeID',\DB::raw('count(partrecipientID) as recipient'))
                                    ->leftjoin('participants','participants.serviceTransactionPrimeID','=','servicetransactions.serviceTransactionPrimeID')
                                    ->join('partrecipients', 'participants.participantID', '=', 'partrecipients.participantID')
                                    ->groupBy('serviceTransactionPrimeID')
                                    ->where('servicetransactions.archive','0')
                                    ->where('status','Finished')
                                    ->get();

        $fromDate = null;
        $toDate = null;
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
        
        
        return $pdf->download('Report-RegisteredServces.pdf');

        return back();
    }


    public function printRange(Request $r){

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
