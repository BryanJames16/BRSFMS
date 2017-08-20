<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Collection;

class CollectionController extends Controller
{
    public function index() {
        $collections = \DB::table('collections AS c')
                        -> table('reservations AS r')
                        -> table('residents AS res')
                        -> table('people AS p')
                        -> table('documentHeaderRequests AS d')
                        -> select('c.collectionPrimeID', 'c.collectionID', 
                                    'c.collectionType', 'c.amount', 
                                    'c.status', 'res.firstName', 
                                    'res.middleName', 'res.lastName', 
                                    'res.residentID', 'res.residentPrimeID')
                        -> join('reservations', 'c.reservationPrimeID', '=', 'r.reservationPrimeID') 
                        -> join('documentHeaderRequests', 'c.documentHeaderPrimeID', '=', 'd.documentHeaderPrimeID') 
                        -> join('residents', 'c.residentPrimeID', '=', 'res.residentPrimeID') 
                        -> join('people', 'c.peoplePrimeID', '=', 'p.peoplePrimeID')
                        -> where('r.status', '!=', 'Cancelled')
                        -> where('d.status', '!=', 'Pending')
                        -> get();
        return view('collection')->with('collections', $collections);
    }

    public function getCollections(Request $r) {

    }
}
