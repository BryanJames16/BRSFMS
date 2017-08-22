<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Collection;

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
                        -> join('documentHeaderRequests', 
                                    'collections.documentHeaderPrimeID', '=', 'documentHeaderRequests.documentHeaderPrimeID') 
                        -> join('residents', 
                                    'collections.residentPrimeID', '=', 'residents.residentPrimeID') 
                        -> join('people', 
                                    'collections.peoplePrimeID', '=', 'people.peoplePrimeID')
                        -> where('reservations.status', '!=', 'Cancelled')
                        -> where('documentHeaderRequests.status', '!=', 'Pending')
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
}
