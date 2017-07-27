<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Document;
use \App\Models\Documentdetailrequest;
use \App\Models\Documentheaderrequest;
use \App\Models\Resident;
use \Illuminate\Validation\Rule;

require_once(app_path() . "/includes/pktool.php");

use StaticCounter;
use SmartMove;

class DocumentRequestController extends Controller 
{
    public function index() {
        

        $requests= \DB::table('documentheaderrequests') ->select('documentheaderrequests.*','documentdetailrequests.documentPrimeID','documentdetailrequests.quantity',
                                                               'documentdetailrequests.headerPrimeID', 'documents.documentName',
                                                               'residents.firstName','residents.middleName','residents.lastName') 
                                                               
                                        ->join('documentdetailrequests', 'documentheaderrequests.documentHeaderPrimeID', '=', 'documentdetailrequests.headerPrimeID')
                                        ->join('documents', 'documentdetailrequests.documentPrimeID', '=', 'documents.primeID')
                                        ->join('residents', 'documentheaderrequests.peoplePrimeID', '=', 'residents.residentPrimeID')
                                        ->get();

        return view('document-request')->with('requests', $requests);

    }

    public function refresh() {

    }

    public function store() {

    }

    public function view() {

    }

    public function nextPK() {

    }

    public function update() {

    }
}