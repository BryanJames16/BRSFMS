<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Collection;
use Carbon\Carbon;
use PDF;

class ReportsCollectionController extends Controller
{
    public function index() {
        return view('report-collection');
    }

    public function previewAll() {
        
        $fromDate = null;
        $toDate = null;
        $total = 0;
        $totalCollections = 0;
        $totalCollectionID = 0;
        $totalCollectionDocu = 0;
        $totalCollectionReservation = 0;

        $reserveRes = Collection::select('collections.collectionPrimeID', 
                                            'collections.collectionID', 
                                            'collections.collectionType', 
                                            'collections.amount', 
                                            'collections.status', 
                                            'collections.paymentDate', 
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
                        -> where('collections.status','=','Paid')
                        -> get();

        $reserveNonRes = Collection::select('collections.collectionPrimeID', 
                                            'collections.collectionID', 
                                            'collections.collectionType', 
                                            'collections.amount', 
                                            'collections.status', 
                                            'collections.paymentDate', 
                                            'reservations.name', 
                                            'reservations.reservationName')
                        -> join('reservations', 
                                    'collections.reservationPrimeID', '=', 'reservations.primeID') 
                        -> where('reservationPrimeID','!=',null)
                        -> where('residentPrimeID','=',null)
                        -> where('collections.status','Paid')
                        -> where('reservations.status', '!=', 'Cancelled')
                        -> get();

        $collectionReq = Collection::select('collections.collectionPrimeID', 
                                            'collections.collectionID', 
                                            'collections.collectionType', 
                                            'collections.amount', 
                                            'collections.status', 
                                            'collections.paymentDate',
                                            'firstName','middleName','lastName')
                        -> join('documentrequests', 
                                    'collections.documentHeaderPrimeID', '=', 'documentrequests.documentRequestPrimeID') 
                        -> join('residents', 
                                    'documentrequests.residentPrimeID', '=', 'residents.residentPrimeID') 
                        -> where('collections.status','Paid')
                        -> get();
        $totalReq = Collection::join('documentrequests', 
                                    'collections.documentHeaderPrimeID', '=', 'documentrequests.documentRequestPrimeID') 
                        -> join('residents', 
                                    'documentrequests.residentPrimeID', '=', 'residents.residentPrimeID') 
                        -> where('collections.status','Paid')
                        -> count();

        $totalN = Collection::join('reservations', 
                                    'collections.reservationPrimeID', '=', 'reservations.primeID') 
                        -> where('reservationPrimeID','!=',null)
                        -> where('residentPrimeID','=',null)
                        -> where('collections.status','Paid')
                        -> where('reservations.status', '!=', 'Cancelled')
                        -> count();

        foreach($reserveRes as $rr)
        {
            $totalCollectionReservation += $rr->amount;
        }

        foreach($reserveNonRes as $rrn)
        {
            $totalCollectionReservation += $rrn->amount;
        }
        
        $totalR = Collection::join('reservations', 
                                    'collections.reservationPrimeID', '=', 'reservations.primeID') 
                        -> join('residents', 
                                    'collections.residentPrimeID', '=', 'residents.residentPrimeID') 
                        -> where('collections.status','=','Paid')
                        -> count();

        $collectionID = Collection::select('collections.collectionPrimeID', 
                                            'collections.collectionID', 
                                            'collections.collectionType', 
                                            'collections.collectionDate',
                                            'collections.paymentDate', 
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
                        -> where('collections.status','Paid')
                        -> get();

        foreach($collectionID as $ci)
        {
            $totalCollectionID += $ci->amount;
        }

        foreach($collectionReq as $cr)
        {
            $totalCollectionDocu += $cr->amount;
        }
        
        $totalI = Collection::join('barangaycard', 
                                    'collections.cardID', '=', 'barangaycard.cardID') 
                        -> join('residents', 
                                    'barangaycard.rID', '=', 'residents.residentPrimeID')             
                        -> where('collections.status','Paid')
                        -> count();

        $total = $totalI + $totalR + $totalN + $totalReq;
        $totalCollections = $totalCollectionID + $totalCollectionDocu + $totalCollectionReservation;

        

        return view('preview.collection')    
                        ->with('fromDate',$fromDate)
                        ->with('toDate',$toDate)
                        ->with('total',$total)
                        ->with('totalCollections',$totalCollections)
                        ->with('totalCollectionID',$totalCollectionID)
                        ->with('totalCollectionDocu',$totalCollectionDocu)
                        ->with('totalCollectionReservation',$totalCollectionReservation)
                        ->with('reserveRes',$reserveRes)
                        ->with('reserveNonRes',$reserveNonRes)
                        ->with('collectionID',$collectionID)
                        ->with('collectionReq',$collectionReq);
    }

    public function previewRange($fromDate,$toDate) {
        
        $total = 0;
        $totalCollections = 0;
        $totalCollectionID = 0;
        $totalCollectionDocu = 0;
        $totalCollectionReservation = 0;

        $reserveRes = Collection::select('collections.collectionPrimeID', 
                                            'collections.collectionID', 
                                            'collections.collectionType', 
                                            'collections.amount', 
                                            'collections.status', 
                                            'collections.paymentDate', 
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
                        -> where('collections.status','=','Paid')
                        -> whereBetween('paymentDAte',[$fromDate,$toDate])
                        -> get();

        $reserveNonRes = Collection::select('collections.collectionPrimeID', 
                                            'collections.collectionID', 
                                            'collections.collectionType', 
                                            'collections.amount', 
                                            'collections.status', 
                                            'collections.paymentDate', 
                                            'reservations.name', 
                                            'reservations.reservationName')
                        -> join('reservations', 
                                    'collections.reservationPrimeID', '=', 'reservations.primeID') 
                        -> where('reservationPrimeID','!=',null)
                        -> where('residentPrimeID','=',null)
                        -> whereBetween('paymentDAte',[$fromDate,$toDate])
                        -> where('collections.status','Paid')
                        -> where('reservations.status', '!=', 'Cancelled')
                        -> get();

        $collectionReq = Collection::select('collections.collectionPrimeID', 
                                            'collections.collectionID', 
                                            'collections.collectionType', 
                                            'collections.amount', 
                                            'collections.status', 
                                            'collections.paymentDate',
                                            'firstName','middleName','lastName')
                        -> join('documentrequests', 
                                    'collections.documentHeaderPrimeID', '=', 'documentrequests.documentRequestPrimeID') 
                        -> join('residents', 
                                    'documentrequests.residentPrimeID', '=', 'residents.residentPrimeID') 
                        -> where('collections.status','Paid')
                        -> whereBetween('paymentDAte',[$fromDate,$toDate])
                        -> get();
        $totalReq = Collection::join('documentrequests', 
                                    'collections.documentHeaderPrimeID', '=', 'documentrequests.documentRequestPrimeID') 
                        -> join('residents', 
                                    'documentrequests.residentPrimeID', '=', 'residents.residentPrimeID') 
                        -> where('collections.status','Paid')
                        -> whereBetween('paymentDAte',[$fromDate,$toDate])
                        -> count();

        $totalN = Collection::join('reservations', 
                                    'collections.reservationPrimeID', '=', 'reservations.primeID') 
                        -> where('reservationPrimeID','!=',null)
                        -> where('residentPrimeID','=',null)
                        -> where('collections.status','Paid')
                        -> where('reservations.status', '!=', 'Cancelled')
                        -> whereBetween('paymentDAte',[$fromDate,$toDate])
                        -> count();

        foreach($reserveRes as $rr)
        {
            $totalCollectionReservation += $rr->amount;
        }

        foreach($reserveNonRes as $rrn)
        {
            $totalCollectionReservation += $rrn->amount;
        }
        
        $totalR = Collection::join('reservations', 
                                    'collections.reservationPrimeID', '=', 'reservations.primeID') 
                        -> join('residents', 
                                    'collections.residentPrimeID', '=', 'residents.residentPrimeID') 
                        -> where('collections.status','=','Paid')
                        -> whereBetween('paymentDAte',[$fromDate,$toDate])
                        -> count();

        $collectionID = Collection::select('collections.collectionPrimeID', 
                                            'collections.collectionID', 
                                            'collections.collectionType', 
                                            'collections.collectionDate',
                                            'collections.paymentDate', 
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
                        -> where('collections.status','Paid')
                        -> whereBetween('paymentDAte',[$fromDate,$toDate])
                        -> get();

        foreach($collectionID as $ci)
        {
            $totalCollectionID += $ci->amount;
        }

        foreach($collectionReq as $cr)
        {
            $totalCollectionDocu += $cr->amount;
        }
        
        $totalI = Collection::join('barangaycard', 
                                    'collections.cardID', '=', 'barangaycard.cardID') 
                        -> join('residents', 
                                    'barangaycard.rID', '=', 'residents.residentPrimeID')             
                        -> where('collections.status','Paid')
                        -> whereBetween('paymentDAte',[$fromDate,$toDate])
                        -> count();

        $total = $totalI + $totalR + $totalN + $totalReq;
        $totalCollections = $totalCollectionID + $totalCollectionDocu + $totalCollectionReservation;

        

        return view('preview.collection')    
                        ->with('fromDate',$fromDate)
                        ->with('toDate',$toDate)
                        ->with('total',$total)
                        ->with('totalCollections',$totalCollections)
                        ->with('totalCollectionID',$totalCollectionID)
                        ->with('totalCollectionDocu',$totalCollectionDocu)
                        ->with('totalCollectionReservation',$totalCollectionReservation)
                        ->with('reserveRes',$reserveRes)
                        ->with('reserveNonRes',$reserveNonRes)
                        ->with('collectionID',$collectionID)
                        ->with('collectionReq',$collectionReq);

        

    }

    public function printAll(){

        $fromDate = null;
        $toDate = null;
        $total = 0;
        $totalCollections = 0;
        $totalCollectionID = 0;
        $totalCollectionDocu = 0;
        $totalCollectionReservation = 0;

        $reserveRes = Collection::select('collections.collectionPrimeID', 
                                            'collections.collectionID', 
                                            'collections.collectionType', 
                                            'collections.amount', 
                                            'collections.status', 
                                            'collections.paymentDate', 
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
                        -> where('collections.status','=','Paid')
                        -> get();

        $reserveNonRes = Collection::select('collections.collectionPrimeID', 
                                            'collections.collectionID', 
                                            'collections.collectionType', 
                                            'collections.amount', 
                                            'collections.status', 
                                            'collections.paymentDate', 
                                            'reservations.name', 
                                            'reservations.reservationName')
                        -> join('reservations', 
                                    'collections.reservationPrimeID', '=', 'reservations.primeID') 
                        -> where('reservationPrimeID','!=',null)
                        -> where('residentPrimeID','=',null)
                        -> where('collections.status','Paid')
                        -> where('reservations.status', '!=', 'Cancelled')
                        -> get();

        $collectionReq = Collection::select('collections.collectionPrimeID', 
                                            'collections.collectionID', 
                                            'collections.collectionType', 
                                            'collections.amount', 
                                            'collections.status', 
                                            'collections.paymentDate',
                                            'firstName','middleName','lastName')
                        -> join('documentrequests', 
                                    'collections.documentHeaderPrimeID', '=', 'documentrequests.documentRequestPrimeID') 
                        -> join('residents', 
                                    'documentrequests.residentPrimeID', '=', 'residents.residentPrimeID') 
                        -> where('collections.status','Paid')
                        -> get();
        $totalReq = Collection::join('documentrequests', 
                                    'collections.documentHeaderPrimeID', '=', 'documentrequests.documentRequestPrimeID') 
                        -> join('residents', 
                                    'documentrequests.residentPrimeID', '=', 'residents.residentPrimeID') 
                        -> where('collections.status','Paid')
                        -> count();

        $totalN = Collection::join('reservations', 
                                    'collections.reservationPrimeID', '=', 'reservations.primeID') 
                        -> where('reservationPrimeID','!=',null)
                        -> where('residentPrimeID','=',null)
                        -> where('collections.status','Paid')
                        -> where('reservations.status', '!=', 'Cancelled')
                        -> count();

        foreach($reserveRes as $rr)
        {
            $totalCollectionReservation += $rr->amount;
        }

        foreach($reserveNonRes as $rrn)
        {
            $totalCollectionReservation += $rrn->amount;
        }
        
        $totalR = Collection::join('reservations', 
                                    'collections.reservationPrimeID', '=', 'reservations.primeID') 
                        -> join('residents', 
                                    'collections.residentPrimeID', '=', 'residents.residentPrimeID') 
                        -> where('collections.status','=','Paid')
                        -> count();

        $collectionID = Collection::select('collections.collectionPrimeID', 
                                            'collections.collectionID', 
                                            'collections.collectionType', 
                                            'collections.collectionDate',
                                            'collections.paymentDate', 
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
                        -> where('collections.status','Paid')
                        -> get();

        foreach($collectionID as $ci)
        {
            $totalCollectionID += $ci->amount;
        }

        foreach($collectionReq as $cr)
        {
            $totalCollectionDocu += $cr->amount;
        }
        
        $totalI = Collection::join('barangaycard', 
                                    'collections.cardID', '=', 'barangaycard.cardID') 
                        -> join('residents', 
                                    'barangaycard.rID', '=', 'residents.residentPrimeID')             
                        -> where('collections.status','Paid')
                        -> count();

        $total = $totalI + $totalR + $totalN + $totalReq;
        $totalCollections = $totalCollectionID + $totalCollectionDocu + $totalCollectionReservation;
            
        $pdf = PDF::loadView('pdfcollection',compact('fromDate','toDate','total','totalCollections',
                                                        'totalCollectionID','totalCollectionDocu',
                                                        'totalCollectionReservation','reserveRes',
                                                        'reserveNonRes','collectionID','collectionReq'))
                        ->setPaper('a4','landscape')
                        ->setOptions(['defaultFont' => 'sans-serif']);
        
        
        return $pdf->download('Report-Collection.pdf');

        return back();
    }


    public function printRange(Request $r){

        $fromDate = $r->input('fromDate');
        $toDate = $r->input('toDate');
        $total = 0;
        $totalCollections = 0;
        $totalCollectionID = 0;
        $totalCollectionDocu = 0;
        $totalCollectionReservation = 0;

        $reserveRes = Collection::select('collections.collectionPrimeID', 
                                            'collections.collectionID', 
                                            'collections.collectionType', 
                                            'collections.amount', 
                                            'collections.status', 
                                            'collections.paymentDate', 
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
                        -> where('collections.status','=','Paid')
                        -> whereBetween('paymentDAte',[$fromDate,$toDate])
                        -> get();

        $reserveNonRes = Collection::select('collections.collectionPrimeID', 
                                            'collections.collectionID', 
                                            'collections.collectionType', 
                                            'collections.amount', 
                                            'collections.status', 
                                            'collections.paymentDate', 
                                            'reservations.name', 
                                            'reservations.reservationName')
                        -> join('reservations', 
                                    'collections.reservationPrimeID', '=', 'reservations.primeID') 
                        -> where('reservationPrimeID','!=',null)
                        -> where('residentPrimeID','=',null)
                        -> whereBetween('paymentDAte',[$fromDate,$toDate])
                        -> where('collections.status','Paid')
                        -> where('reservations.status', '!=', 'Cancelled')
                        -> get();

        $collectionReq = Collection::select('collections.collectionPrimeID', 
                                            'collections.collectionID', 
                                            'collections.collectionType', 
                                            'collections.amount', 
                                            'collections.status', 
                                            'collections.paymentDate',
                                            'firstName','middleName','lastName')
                        -> join('documentrequests', 
                                    'collections.documentHeaderPrimeID', '=', 'documentrequests.documentRequestPrimeID') 
                        -> join('residents', 
                                    'documentrequests.residentPrimeID', '=', 'residents.residentPrimeID') 
                        -> where('collections.status','Paid')
                        -> whereBetween('paymentDAte',[$fromDate,$toDate])
                        -> get();
        $totalReq = Collection::join('documentrequests', 
                                    'collections.documentHeaderPrimeID', '=', 'documentrequests.documentRequestPrimeID') 
                        -> join('residents', 
                                    'documentrequests.residentPrimeID', '=', 'residents.residentPrimeID') 
                        -> where('collections.status','Paid')
                        -> whereBetween('paymentDAte',[$fromDate,$toDate])
                        -> count();

        $totalN = Collection::join('reservations', 
                                    'collections.reservationPrimeID', '=', 'reservations.primeID') 
                        -> where('reservationPrimeID','!=',null)
                        -> where('residentPrimeID','=',null)
                        -> where('collections.status','Paid')
                        -> where('reservations.status', '!=', 'Cancelled')
                        -> whereBetween('paymentDAte',[$fromDate,$toDate])
                        -> count();

        foreach($reserveRes as $rr)
        {
            $totalCollectionReservation += $rr->amount;
        }

        foreach($reserveNonRes as $rrn)
        {
            $totalCollectionReservation += $rrn->amount;
        }
        
        $totalR = Collection::join('reservations', 
                                    'collections.reservationPrimeID', '=', 'reservations.primeID') 
                        -> join('residents', 
                                    'collections.residentPrimeID', '=', 'residents.residentPrimeID') 
                        -> where('collections.status','=','Paid')
                        -> whereBetween('paymentDAte',[$fromDate,$toDate])
                        -> count();

        $collectionID = Collection::select('collections.collectionPrimeID', 
                                            'collections.collectionID', 
                                            'collections.collectionType', 
                                            'collections.collectionDate',
                                            'collections.paymentDate', 
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
                        -> where('collections.status','Paid')
                        -> whereBetween('paymentDAte',[$fromDate,$toDate])
                        -> get();

        foreach($collectionID as $ci)
        {
            $totalCollectionID += $ci->amount;
        }

        foreach($collectionReq as $cr)
        {
            $totalCollectionDocu += $cr->amount;
        }
        
        $totalI = Collection::join('barangaycard', 
                                    'collections.cardID', '=', 'barangaycard.cardID') 
                        -> join('residents', 
                                    'barangaycard.rID', '=', 'residents.residentPrimeID')             
                        -> where('collections.status','Paid')
                        -> whereBetween('paymentDAte',[$fromDate,$toDate])
                        -> count();

        $total = $totalI + $totalR + $totalN + $totalReq;
        $totalCollections = $totalCollectionID + $totalCollectionDocu + $totalCollectionReservation;


        $pdf = PDF::loadView('pdfcollection',compact('fromDate','toDate','total','totalCollections',
                                                        'totalCollectionID','totalCollectionDocu',
                                                        'totalCollectionReservation','reserveRes',
                                                        'reserveNonRes','collectionID','collectionReq'))
                        ->setPaper('a4','landscape')
                        ->setOptions(['defaultFont' => 'sans-serif']);
        
        
        return $pdf->download('Report-Collection.pdf');

        return back();
    }




}
