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
        $participants= \DB::table('participants')
                                        ->join('residents', 'participants.residentID','=','residents.residentPrimeID')
                                        ->where('participants.serviceTransactionPrimeID',$id)
                                        ->get();
        $recipients= \DB::table('participants')
                                        ->join('partrecipients', 'participants.participantID','=','partrecipients.participantID')
                                        ->join('recipients', 'partrecipients.recipientID','=','recipients.recipientID')
                                        ->where('participants.serviceTransactionPrimeID',$id)
                                        ->get();

        $name= \DB::table('servicetransactions')->where('serviceTransactionPrimeID',$id)
                                        ->get()
                                        ->last();
        $totalParticipants = 0;
        $totalRecipients = 0;

        foreach($participants as $asd){
            $totalParticipants += 1;
        }

        foreach($recipients as $a){
            $totalRecipients += $a->quantity;
        }



        return view('preview.participant')
                        ->with('totalParticipants',$totalParticipants)
                        ->with('participants',$participants)
                        ->with('name',$name)
                        ->with('recipients',$recipients)
                        ->with('totalRecipients',$totalRecipients);
    }

    


    public function print(Request $r){

        $id = $r->input('id');

        $participants= \DB::table('participants')
                                        ->join('residents', 'participants.residentID','=','residents.residentPrimeID')
                                        ->where('participants.serviceTransactionPrimeID',$id)
                                        ->get();
        $recipients= \DB::table('participants')
                                        ->join('partrecipients', 'participants.participantID','=','partrecipients.participantID')
                                        ->join('recipients', 'partrecipients.recipientID','=','recipients.recipientID')
                                        ->where('participants.serviceTransactionPrimeID',$id)
                                        ->get();

        $name= \DB::table('servicetransactions')->where('serviceTransactionPrimeID',$id)
                                        ->get()
                                        ->last();
        $totalParticipants = 0;
        $totalRecipients = 0;

        foreach($participants as $asd){
            $totalParticipants += 1;
        }

        foreach($recipients as $a){
            $totalRecipients += $a->quantity;
        }

        

        $pdf = PDF::loadView('pdfparticipant',compact('participants','name','recipients','totalRecipients','totalParticipants'))
                        ->setPaper('a4','landscape')
                        ->setOptions(['defaultFont' => 'sans-serif']);
        
        
        return $pdf->download('ServiceParticipants.pdf');

        return back();
    }




}
