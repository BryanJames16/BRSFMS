<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Document;
use \App\Models\Documentdetailrequest;
use \App\Models\Documentheaderrequest;
use \App\Models\Resident;
use \Illuminate\Validation\Rule;
use Carbon\Carbon;

require_once(app_path() . "/includes/pktool.php");

use StaticCounter;
use SmartMove;

class DocumentRequestController extends Controller 
{
    public function index() {
        $requests= \DB::table('documentheaderrequests') -> select('documentheaderrequests.*','documentdetailrequests.documentPrimeID','documentdetailrequests.quantity',
                                                               'documentdetailrequests.headerPrimeID', 'documents.documentName',
                                                               'residents.firstName', 'residents.middleName', 'residents.lastName')                 
                                        ->join('documentdetailrequests', 'documentheaderrequests.documentHeaderPrimeID', '=', 'documentdetailrequests.headerPrimeID')
                                        ->join('documents', 'documentdetailrequests.documentPrimeID', '=', 'documents.primeID')
                                        ->join('residents', 'documentheaderrequests.peoplePrimeID', '=', 'residents.residentPrimeID')
                                        ->get();

        return view('document-request') -> with('requests', $requests);
    }

    public function refresh() {

    }

    public function store(Request $r) {
        $headRet = DocumentHeaderRequest::insert([
            "requestID" => trim($r -> input('requestID')), 
            "requestDate" => Carbon::now(), 
            "status" => "Pending", 
            "peoplePrimeID" => trim($r -> input('peoplePrimeID'))
        ]);

        $findRet = DocumentHeaderRequest::all() -> last();

        $detailRet = DocumentDetailRequest::insert([
            "headerPrimeID" => trim($findRet->documentHeaderPrimeID),
            "documentPrimeID" => $r -> input('documentPrimeID'),
            "quantity" => $r -> input('quantity')
        ]);

        return back();
    }

    public function view() {

    }

    public function nextPK(Request $r) {
        if ($r->ajax()) {
            $data = DocumentHeaderRequest::all()->last();
            
            if (is_null($data)) {
                
            } 
            else {
                $nextValue = StaticCounter::smart_next($data->requestID, SmartMove::$NUMBER);
                return response($nextValue);
            }
        }
    }

    public function getRequestor(Request $r) {
        $residents = Resident::select('residentPrimeID', 
                                            'firstName', 
                                            'lastName', 
                                            'middleName', 
                                            'suffix', 
                                            'status')
                                        -> where('status','1')
                                        -> get();
        return (response($residents));
    }

    public function getDocument(Request $r) {
        $documents = Document::select('primeID', 'documentName', 'status')
                                    -> where('status','1')
                                    -> get();
        return (response($documents));
    }

    public function update() {

    }
}