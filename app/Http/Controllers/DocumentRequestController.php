<?php 

namespace App\Http\Controllers;

require_once(app_path() . '/Includes/pktool.php');

use Illuminate\Http\Request;
use \App\Models\Document;
use \App\Models\Documentdetailrequest;
use \App\Models\Documentheaderrequest;
use \App\Models\Resident;
use \Illuminate\Validation\Rule;
use Carbon\Carbon;

use StaticCounter;
use SmartMove;

class DocumentRequestController extends Controller 
{
    public function index() {
        $requests= \DB::table('documentheaderrequests') -> select('documentheaderrequests.*','documentdetailrequests.documentPrimeID','documentdetailrequests.quantity',
                                                               'documentdetailrequests.headerPrimeID', 'documents.documentName',
                                                               'residents.firstName', 'residents.middleName', 'residents.lastName', 'residents.suffix')                 
                                        ->join('documentdetailrequests', 'documentheaderrequests.documentHeaderPrimeID', '=', 'documentdetailrequests.headerPrimeID')
                                        ->join('documents', 'documentdetailrequests.documentPrimeID', '=', 'documents.primeID')
                                        ->join('residents', 'documentheaderrequests.peoplePrimeID', '=', 'residents.residentPrimeID')
                                        ->get();

        return view('document-request') -> with('requests', $requests);
    }

    public function refresh() {
        $requests= \DB::table('documentheaderrequests') -> select('documentheaderrequests.*','documentdetailrequests.documentPrimeID','documentdetailrequests.quantity',
                                                               'documentdetailrequests.headerPrimeID', 'documents.documentName',
                                                               'residents.firstName', 'residents.middleName', 'residents.lastName', 'residents.suffix')                 
                                        ->join('documentdetailrequests', 'documentheaderrequests.documentHeaderPrimeID', '=', 'documentdetailrequests.headerPrimeID')
                                        ->join('documents', 'documentdetailrequests.documentPrimeID', '=', 'documents.primeID')
                                        ->join('residents', 'documentheaderrequests.peoplePrimeID', '=', 'residents.residentPrimeID')
                                        ->get();

        return (json_encode($requests));
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

    public function view(Request $r) {
        if ($r -> ajax()) {
            $documentFormat = new DocumentFormat();

            $transHead = DocumentHeaderRequest::find($r -> input('documentHeaderPrimeID'));
            $transDetail = DocumentDetailRequest::select("documentDetailPrimeID", "headerPrimeID", "documentPrimeID")
                                                    -> where("headerPrimeID", "=", $r -> input('documentHeaderPrimeID')) 
                                                    -> get()
                                                    -> first();

            //dd($transDetail);

            $document = Document::find($transDetail -> documentPrimeID);
            $resident = Resident::find($transHead -> peoplePrimeID);

            $documentContent = $document -> documentContent;
            
            if (stripos($documentContent, "{lastname}") !== false) {
                $documentContent = str_ireplace("{lastName}", $resident -> lastName, $documentContent);
            }

            if (stripos($documentContent, "{firstname}") !== false) {
                $documentContent = str_ireplace("{firstname}", $resident -> firstName, $documentContent);
            }

            if (stripos($documentContent, "{middlename}") !== false) {
                $documentContent = str_ireplace("{middleName}", $resident -> middleName, $documentContent);
            }

            if (stripos($documentContent, "{suffix}") !== false) {
                $documentContent = str_ireplace("{suffix}", $resident -> suffix, $documentContent);
            }

            if (stripos($documentContent, "{residentid}") !== false) {
                $documentContent = str_ireplace("{residentid}", $resident -> residentID, $documentContent);
            }

            if (stripos($documentContent, "{contactnumber}") !== false) {
                $documentContent = str_ireplace("{contactnumber}", $resident -> contactNumber, $documentContent);
            }

            if (stripos($documentContent, "{gender}") !== false) {
                if ($resident -> gender == "M") {
                    $documentContent = str_ireplace("{gender}", "Male", $documentContent);
                }
                else {
                    $documentContent = str_ireplace("{gender}", "Female", $documentContent);
                }
            }

            if (stripos($documentContent, "{sgender}") !== false) {
                if ($resident -> gender == "M") {
                    $documentContent = str_ireplace("{gender}", "male", $documentContent);
                }
                else {
                    $documentContent = str_ireplace("{gender}", "female", $documentContent);
                }
            }

            if (stripos($documentContent, "{gender:opt}") !== false) {
                if ($resident -> gender == "M") {
                    $documentContent = str_ireplace("{gender:opt}", "He", $documentContent);
                }
                else {
                    $documentContent = str_ireplace("{gender:opt}", "She", $documentContent);
                }
            }

            if (stripos($documentContent, "{sgender:opt}") !== false) {
                if ($resident -> gender == "M") {
                    $documentContent = str_ireplace("{sgender:opt}", "he", $documentContent);
                }
                else {
                    $documentContent = str_ireplace("{sgender:opt}", "she", $documentContent);
                }
            }

            if (stripos($documentContent, "{gender:sopt}") !== false) {
                if ($resident -> gender == "M") {
                    $documentContent = str_ireplace("{gender:sopt}", "His", $documentContent);
                }
                else {
                    $documentContent = str_ireplace("{gender:sopt}", "Her", $documentContent);
                }
            }

            if (stripos($documentContent, "{sgender:sopt}") !== false) {
                if ($resident -> gender == "M") {
                    $documentContent = str_ireplace("{sgender:sopt}", "his", $documentContent);
                }
                else {
                    $documentContent = str_ireplace("{sgender:sopt}", "her", $documentContent);
                }
            }

            if (stripos($documentContent, "{gender:eopt}") !== false) {
                if ($resident -> gender == "M") {
                    $documentContent = str_ireplace("{gender:eopt}", "Him", $documentContent);
                }
                else {
                    $documentContent = str_ireplace("{gender:eopt}", "Her", $documentContent);
                }
            }

            if (stripos($documentContent, "{sgender:eopt}") !== false) {
                if ($resident -> gender == "M") {
                    $documentContent = str_ireplace("{sgender:eopt}", "him", $documentContent);
                }
                else {
                    $documentContent = str_ireplace("{sgender:eopt}", "her", $documentContent);
                }
            }

            if (stripos($documentContent, "{birdthdate}") !== false) {
                $birthdateText = date("F j, Y", $resident -> birthDate);
                $documentContent = str_ireplace("{birthdate}", $birthdateText, $documentContent);
            }

            if (stripos($documentContent, "{civilstatus}") !== false) {
                $documentContent = str_ireplace("{civilstatus}", $resident -> civilStatus, $documentContent);
            }

            if (stripos($documentContent, "{scivilstatus}") !== false) {
                $documentContent = str_ireplace("{scivilstatus}", strtolower($resident -> civilStatus), $documentContent);
            }

            if (stripos($documentContent, "{seniorcitizenid}") !== false) {
                $documentContent = str_ireplace("{seniorcitizenid}", $resident -> seniorCitizenID, $documentContent);
            }

            if (stripos($documentContent, "{disabilities}") !== false) {
                $documentContent = str_ireplace("{disabilities}", $resident -> disabilities, $documentContent);
            }

            if (stripos($documentContent, "{residenttype}") !== false) {
                $documentContent = str_ireplace("{residenttype}", $resident -> residenttype, $documentContent);
            }

            if (stripos($documentContent, "{disabilities}") !== false) {
                $documentContent = str_ireplace("{disabilities}", $resident -> disabilities, $documentContent);
            }

            $documentFormat -> documentID = $document -> documentID;
            $documentFormat -> documentName = $document -> documentName;
            $documentFormat -> requestorName = $resident -> lastName . ", " . 
                                                    $resident -> firstName . " " . 
                                                    $resident -> middleName . " " . 
                                                    $resident -> suffix . " ";
            $documentFormat -> documentContent = $documentContent;

            return response([
                "documentID" => $documentFormat -> documentID, 
                "documentName" => $documentFormat -> documentName, 
                "requestorName" => $documentFormat -> requestorName,
                "documentContent" => $documentFormat -> documentContent
            ]);
        }
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
        //echo "Residents is: " . $residents;
        return (response($residents));
    }

    public function getDocument(Request $r) {
        $documents = Document::select('primeID', 'documentName', 'status')
                                    -> where('status','1')
                                    -> get();
        return (response($documents));
    }

    public function delete(Request $r) {

        echo "Passed value is: " . $r -> input('documentHeaderPrimeID');

        $documentRequest = DocumentHeaderRequest::find($r -> input('documentHeaderPrimeID'));
        $documentRequest -> status = "Cancelled";
        $documentRequest -> save();

        return redirect('/document-request');
    }
}

class DocumentFormat {
    public $documentID = "";
    public $documentName = "";
    public $documentContent = "";
    public $requestorName = "";
}
