<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Collection;
use \App\Models\Utility;

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
                        -> where('collections.status', '!=', 'Paid')
                        -> get();
        return view('collection')->with('collections', $collections);
    }

    public function getCollections(Request $r) {
        $collections = Collection::select('collections.collectionPrimeID', 
                                'collections.collectionID', 
                                'collections.collectionType', 
                                'collections.amount', 
                                'collections.status', 
                                'residents.firstName', 
                                'residents.middleName', 
                                'residents.lastName', 
                                'residents.residentID', '
                                residents.residentPrimeID')
                        -> join('reservations', 
                        'collections.reservationPrimeID', '=', 'reservations.primeID') 
                        -> join('documentHeaderRequests', 
                        'collections.documentHeaderPrimeID', '=', 'documentHeaderRequests.documentHeaderPrimeID') 
                        -> join('residents', 
                        'collections.residentPrimeID', '=', 'residents.residentPrimeID') 
                        -> join('people', 
                        'collections.peoplePrimeID', '=', 'people.peoplePrimeID')
                        -> where('reservations.status', '!=', 'Cancelled')
                        -> where('documentHeaderRequests.status', '!=', 'Pending')
                        -> get();
        return response($collections);
    }

    public function getHeader(Request $r) {
        $headerDetails = Utility::select('barangayName', 'address') -> get() -> last();
        return json_encode($headerDetails);
    }

    public function getAmount(Request $r) {
        $amount = Collection::select('amount')
                                -> where('collectionPrimeID', '=', $r->input('collectionPrimeID'))
                                -> get();
        return json_encode($amount);
    }

    public function payCollection(Request $r) {
        $collection = Collection::find($r->input('collectionPrimeID'));
        $collection -> recieved = $r -> input('recieved');
        $collecti9on -> status = "paid";
        $collection -> save();
        return back();
    }
}
