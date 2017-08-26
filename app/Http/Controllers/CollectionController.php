<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Collection;
use \App\Models\Facility;
use \App\Models\Reservation;
use \App\Models\Resident;
use \App\Models\Utility;
use Carbon\Carbon;

class CollectionController extends Controller
{
    public function index() {
        $collections = Collection::select('collections.collectionPrimeID', 
                                            'collections.collectionID', 
                                            'collections.collectionType', 
                                            'collections.amount', 
                                            'collections.status', 
                                            'residents.firstName', 
                                            'residents.middleName', 
                                            'residents.lastName', 
                                            'residents.residentID', 
                                            'residents.residentPrimeID')
                        -> join('reservations', 
                                    'collections.reservationPrimeID', '=', 'reservations.primeID') 
                        -> join('residents', 
                                    'collections.residentPrimeID', '=', 'residents.residentPrimeID') 
                        -> where('reservations.status', '!=', 'Cancelled')
                        //-> where('collections.status', '!=', 'Paid')
                        -> get();
        return view('collection')->with('collections', $collections);
    }

    public function getCollection(Request $r) {
        $collections = Collection::select('collections.collectionPrimeID', 
                                            'collections.collectionID', 
                                            'collections.collectionType', 
                                            'collections.amount', 
                                            'collections.status', 
                                            'residents.firstName', 
                                            'residents.middleName', 
                                            'residents.lastName', 
                                            'residents.residentID', 
                                            'residents.residentPrimeID')
                                    -> join('reservations', 
                                    'collections.reservationPrimeID', '=', 'reservations.primeID') 
                                    -> join('residents', 
                                    'collections.residentPrimeID', '=', 'residents.residentPrimeID') 
                                    -> where('reservations.status', '!=', 'Cancelled')
                                    //-> where('collections.status', '!=', 'Paid')
                                    -> get();
        return json_encode($collections);
    }

    public function getHeader(Request $r) {
        $headerDetails = Utility::select('barangayName', 'address') -> get() -> last();
        return json_encode($headerDetails);
    }

    public function getAmount(Request $r) {
        $amount = Collection::select('amount')
                                -> where('collectionPrimeID', '=', $r->input('collectionPrimeID'))
                                -> get()
                                -> last();
        return json_encode($amount);
    }

    public function getTransact(Request $r) {
        $transact = Collection::where('collectionPrimeID', '=', $r->input('collectionPrimeID'))
                                -> get();
                                
        $resident = Resident::select('*')
                                -> where('residentPrimeID', '=', $transact->residentPrimeID)
                                -> get();
        if ($transact -> collectionType == 1) {

        }
        else if ($transact -> collectionType == 2) {
            
        }
        else if ($transact -> collectionType == 3) {
            $reservation = Reservation::where('primeID', '=', $transact->reservationPrimeID)
                                        -> get() 
                                        -> last();
        }
        else if ($transact -> collectionType == 4) {
        
        }
        else {

        }
        
        $receiptInfo = new ReceiptInfo();
        $receiptInfo -> transactionID = $transact -> collectionID;
        $receiptInfo -> customerName = $resident -> fisrtName . " " . 
                                        $resident -> middleName . " " . 
                                        $resident -> lastName . " " . 
                                        "(" . $resident -> residentID . ")";
        $receiptInfo -> transactionDate = $transact -> collectionDate;
        $receiptInfo -> paymentDate = $transact -> paymentDate;

        if ($transact -> collectionType == 1) {

        }
        else if ($transact -> collectionType == 2) {
            
        }
        else if ($transact -> collectionType == 3) {
            
            $facility = Facility::where('facilityID', '=', $reservation -> facilityPrimeID)
                                    -> get() 
                                    -> last();
            $receiptInfo -> partObject = $facility -> facilityName;
            $receiptInfo -> quantity = 1;
        }
        else if ($transact -> collectionType == 4) {
            
        }
        else {

        }
        
        $receiptInfo -> cash = $transact -> amount;
        $receiptInfo -> change = $transact -> recieved;

        return json_encode($receiptInfo);
    }

    public function payCollection(Request $r) {
        $collection = Collection::find($r->input('collectionPrimeID'));
        $collection -> recieved = $r -> input('recieved');
        $collection -> status = "Paid";
        $collection -> paymentDate = Carbon::now();
        $collection -> save();
        return back();
    }
}

class ReceiptInfo 
{
    public $transactionID = "";
    public $customerName = "";
    public $transactionDate = "";
    public $paymentDate = "";
    public $partObject = "";
    public $quantity = "";
    public $cash = "";
    public $change = "";
}
