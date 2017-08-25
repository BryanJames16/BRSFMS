<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Collection;
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
                                -> get()
                                -> last();
        return json_encode($transact);
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
