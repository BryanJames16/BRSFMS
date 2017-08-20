<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Collection;

class CollectionController extends Controller
{
    public function index() {
        $collections = Collection::table('collections AS c')
                                -> table('reservation AS r')
                                -> table('documentHeader AS d')
                                -> select('c.collectionPrimeID', 'c.collectionID', 
                                            'c.collectionType', 'c.amount', 
                                            'c.status');
        return view('collection')->with('collections', $collections);
    }

    public function getCollections(Request $r) {

    }
}
