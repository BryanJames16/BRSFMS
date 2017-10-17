<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Collection;
use \App\Models\Facility;
use \App\Models\Reservation;
use \App\Models\Resident;
use \App\Models\Utility;
use \App\Models\Barangaycard;
use Carbon\Carbon;

class CollectionController extends Controller
{
    public function index() {
        $collectionsR = Collection::select('collections.collectionPrimeID', 
                                            'collections.collectionID', 
                                            'collections.collectionType', 
                                            'collections.amount', 
                                            'collections.status', 
                                            'residents.firstName', 
                                            'residents.middleName', 
                                            'residents.lastName', 
                                            'residents.residentID', 
                                            'reservations.reservationName', 
                                            'residents.residentPrimeID')
                        -> join('reservations', 
                                    'collections.reservationPrimeID', '=', 'reservations.primeID') 
                        -> join('residents', 
                                    'collections.residentPrimeID', '=', 'residents.residentPrimeID') 
                        -> where('reservations.status', '!=', 'Cancelled')
                        -> whereNotNull('collections.reservationPrimeID')
                        -> where('collections.status','=','Pending')
                        -> whereNotNull('collections.residentPrimeID')
                        -> get();
        
        $collectionsN = Collection::select('collections.collectionPrimeID', 
                                            'collections.collectionID', 
                                            'collections.collectionType', 
                                            'collections.amount', 
                                            'collections.status', 
                                            'reservations.name', 
                                            'reservations.reservationName')
                        -> join('reservations', 
                                    'collections.reservationPrimeID', '=', 'reservations.primeID') 
                        -> where('reservationPrimeID','!=',null)
                        -> where('residentPrimeID','=',null)
                        -> where('reservations.status', '!=', 'Cancelled')
                        -> get();

        $collID = Collection::select('collections.collectionPrimeID', 
                                            'collections.collectionID', 
                                            'collections.collectionType', 
                                            'collections.collectionDate', 
                                            'collections.amount', 
                                            'collections.status', 
                                            'residents.firstName', 
                                            'residents.middleName', 
                                            'residents.lastName', 
                                            'residents.residentID', 
                                            'residents.residentPrimeID')
                        -> join('barangaycard', 
                                    'collections.cardID', '=', 'barangaycard.cardID') 
                        -> join('residents', 
                                    'barangaycard.rID', '=', 'residents.residentPrimeID')             
                        -> get();

        $collRequest = Collection::select('collections.collectionPrimeID', 
                                            'collections.collectionID', 
                                            'collections.collectionType', 
                                            'collections.collectionDate', 
                                            'collections.amount', 
                                            'collections.status', 
                                            'residents.firstName', 
                                            'residents.middleName', 
                                            'residents.lastName', 
                                            'residents.residentID', 
                                            'residents.residentPrimeID',
                                            'documents.documentName')
                        -> join('documentrequests', 
                                    'collections.documentHeaderPrimeID', '=', 'documentrequests.documentRequestPrimeID') 
                        -> join('residents', 
                                    'documentrequests.residentPrimeID', '=', 'residents.residentPrimeID')             
                        -> join('documents', 
                                    'documentrequests.documentsPrimeID', '=', 'documents.primeID')             
                        -> where('collections.status', 'Pending')
                        -> get();


        return view('collection')
                                ->with('collectionsR', $collectionsR)
                                ->with('collectionsN', $collectionsN)
                                ->with('collRequest', $collRequest)
                                ->with('collID', $collID);
    }

    public function refreshID(Request $r) {
        if ($r -> ajax()) {
            return json_encode(\DB::table('collections') ->select('collections.collectionPrimeID', 
                                                                'collections.collectionID', 
                                                                'collections.collectionType', 
                                                                'collections.collectionDate', 
                                                                'collections.amount', 
                                                                'collections.status', 
                                                                'residents.firstName', 
                                                                'residents.middleName', 
                                                                'residents.lastName', 
                                                                'residents.residentID', 
                                                                'residents.residentPrimeID')
                                            -> join('barangaycard', 
                                                        'collections.cardID', '=', 'barangaycard.cardID') 
                                            -> join('residents', 
                                                        'barangaycard.rID', '=', 'residents.residentPrimeID')             
                                            -> get());
        }
        else {
            return view('errors.403');
        }
    }

    

    public function refreshRequest(Request $r) {
        if ($r -> ajax()) {
            return json_encode(\DB::table('collections') ->select('collections.collectionPrimeID', 
                                            'collections.collectionID', 
                                            'collections.collectionType', 
                                            'collections.collectionDate', 
                                            'collections.amount', 
                                            'collections.status', 
                                            'residents.firstName', 
                                            'residents.middleName', 
                                            'residents.lastName', 
                                            'residents.residentID', 
                                            'residents.residentPrimeID',
                                            'documents.documentName')
                        -> join('documentrequests', 
                                    'collections.documentHeaderPrimeID', '=', 'documentrequests.documentRequestPrimeID') 
                        -> join('residents', 
                                    'documentrequests.residentPrimeID', '=', 'residents.residentPrimeID')             
                        -> join('documents', 
                                    'documentrequests.documentsPrimeID', '=', 'documents.primeID')             
                        -> get());
        }
        else {
            return view('errors.403');
        }
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

    public function getResID(Request $r) {
        $collections = Collection::select('reservationPrimeID')
                                    -> where('collectionPrimeID', '=', $r->input('collectionPrimeID'))
                                    //-> where('collections.status', '!=', 'Paid')
                                    -> get();
        return json_encode($collections);
    }

    public function getReserveRCollection(Request $r) {
        $collections = Collection::select('collections.collectionPrimeID', 
                                            'collections.collectionID', 
                                            'collections.collectionType', 
                                            'collections.amount', 
                                            'collections.status', 
                                            'reservations.reservationName', 
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
                                    -> get();
        
        return json_encode($collections);
    }

    public function getReserveNCollection(Request $r) {
        $collections = Collection::select('collections.collectionPrimeID', 
                                            'collections.collectionID', 
                                            'collections.collectionType', 
                                            'collections.amount', 
                                            'collections.status', 
                                            'reservations.name', 
                                             'reservations.reservationName', 
                                            'reservations.age', 
                                            'reservations.email', 
                                            'reservations.contactNumber', 
                                            'reservations.primeID')
                                    -> join('reservations', 
                                                'collections.reservationPrimeID', 
                                                '=', 
                                                'reservations.primeID') 
                                    -> where('reservations.status', '!=', 'Cancelled')
                                    -> whereNotNull('reservations.name') 
                                    -> get();
        
        return json_encode($collections);
    }

    public function showReceiptID(Request $r) {
        $collections = Collection::select('collectionID', 
                                            'paymentDate', 
                                            'recieved','amount','firstName','middleName','lastName')
                                    -> join('barangaycard', 
                                                'collections.cardID', 
                                                '=', 
                                                'barangaycard.cardID')
                                    -> join('residents', 
                                                'barangaycard.rID', 
                                                '=', 
                                                'residents.residentPrimeID')
                                    ->where('collectionPrimeID','=',$r->input('collectionPrimeID'))
                                    -> get();
        
        return json_encode($collections);
    }

    public function showReceiptRequest(Request $r) {
        $collections = Collection::select('collectionID', 
                                            'paymentDate', 
                                            'recieved','amount','quantity','documentName','firstName','middleName','lastName')
                                    -> join('documentrequests', 
                                                'collections.documentHeaderPrimeiD', 
                                                '=', 
                                                'documentrequests.documentRequestPrimeID')
                                    -> join('residents', 
                                                'documentrequests.residentPrimeID', 
                                                '=', 
                                                'residents.residentPrimeID')
                                    -> join('documents', 
                                                'documentrequests.documentsPrimeID', 
                                                '=', 
                                                'documents.primeID')
                                    ->where('collectionPrimeID','=',$r->input('collectionPrimeID'))
                                    -> get();
        
        return json_encode($collections);
    }

    public function paidRes(Request $r) {
        if ($r->ajax()) {

            $type = Reservation::find($r->input('primeID'));
            $type->status = 'Paid';
            $type->save();
            return redirect('collection');
        }
        else {
            return view('errors.403');
        }
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
                                -> get()
                                -> first();

        $resident = Resident::where('residentPrimeID', '=', $transact->residentPrimeID)
                                -> get()
                                -> first();
        $reservation = Reservation::all()->last();

        if ($transact -> collectionType == 1) {

        }
        else if ($transact -> collectionType == 2) {
            
        }
        else if ($transact -> collectionType == 3) {
            $reservation = Reservation::select('*')
                                        -> where('primeID', '=', $transact->reservationprimeID)
                                        -> get() 
                                        -> last();
        }
        else if ($transact -> collectionType == 4) {
        
        }
        else {

        }
        
        $receiptInfo = new ReceiptInfo();
        $receiptInfo -> transactionID = $transact -> collectionID;
        
        if (is_null($transact -> residentPrimeID)) {
            $receiptInfo -> customerName = $reservation -> name;
        }
        else {
            $receiptInfo -> customerName = $resident -> firstName . " " . 
                                            $resident -> middleName . " " . 
                                            $resident -> lastName . " " . 
                                            "(" . $resident -> residentID . ")";
        }

        $receiptInfo -> transactionDate = date_format($transact -> collectionDate, 
                                                        "m/d/Y G:i:s A");
        $receiptInfo -> paymentDate = date_format($transact -> paymentDate, 
                                                        "m/d/Y G:i:s A");

        if ($transact -> collectionType == 1) {

        }
        else if ($transact -> collectionType == 2) {
            
        }
        else if ($transact -> collectionType == 3) {
            $facility = Facility::where('primeID', '=', $reservation -> facilityPrimeID)
                                    -> get() 
                                    -> last();
            $receiptInfo -> partObject = $facility -> facilityName;
            $receiptInfo -> quantity = 1;
        }
        else if ($transact -> collectionType == 4) {
            
        }
        else {

        }
        
        $receiptInfo -> amount = $transact -> amount;
        $receiptInfo -> cash = $transact -> recieved;
        if ($transact -> recieved > $transact -> amount) {
            $receiptInfo -> change = ($transact -> recieved - $transact -> amount);
        }
        else {
            $receiptInfo -> change = 0;
        }

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

    public function payID(Request $r) {

        $collection = Collection::find($r->input('collectionPrimeID'));
        $collection -> recieved = $r -> input('recieved');
        $collection -> status = "Paid";
        $collection -> paymentDate = Carbon::now();
        $collection -> save();

        $check = Collection::select('cardID') 
                                        ->where('collectionPrimeID','=',$r->input('collectionPrimeID'))
                                        ->get()
                                        ->last();

        $idColl = Barangaycard::find($check-> cardID);
        $idColl -> status = "1";
        $idColl -> save();                      

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
    public $amount = "";
    public $cash = "";
    public $change = "";
}
