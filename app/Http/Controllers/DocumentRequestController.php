<?php 

namespace App\Http\Controllers;

require_once(app_path() . '/Includes/pktool.php');

use Illuminate\Http\Request;
use \App\Models\Document;
use \App\Models\Documentrequest;
use \App\Models\Requestrequirement;
use \App\Models\Resident;
use \Illuminate\Validation\Rule;
use Carbon\Carbon;
use \App\Models\Utility;
use Illuminate\Support\Facades\Auth;
use \App\Models\Log;

use StaticCounter;
use SmartMove;

class DocumentRequestController extends Controller 
{
    public function index() {
        $requests= \DB::table('documentrequests') 
                                        -> select('documentRequestPrimeID', 'documentsPrimeID', 'quantity',
                                                'documentrequests.residentPrimeID', 'documents.documentName', 'requestDate','requestID',
                                                'residents.firstName', 'residents.middleName','documentrequests.status',
                                                 'residents.lastName', 'residents.suffix')                 
                                        ->join('documents', 'documentrequests.documentsPrimeID', '=', 'documents.primeID')
                                        ->join('residents', 'documentrequests.residentPrimeID', '=', 'residents.residentPrimeID')
                                        ->where('documentrequests.status','!=','Waiting for approval')
                                        ->where('documentrequests.status','!=','Rejected')
                                        ->where('documentrequests.status','!=','Approved')
                                        ->get();

        return view('document-request') -> with('requests', $requests);
    }

    public function refresh(Request $r) {
        if ($r->ajax()) {
            $requests= \DB::table('documentrequests') -> select('documentRequestPrimeID', 'documentsPrimeID', 'quantity',
                                                'documentrequests.residentPrimeID', 'documents.documentName', 'requestDate','requestID',
                                                'residents.firstName', 'residents.middleName','documentrequests.status',
                                                 'residents.lastName', 'residents.suffix')
                                            ->join('documents', 'documentrequests.documentsPrimeID', '=', 'documents.primeID')
                                            ->join('residents', 'documentrequests.residentPrimeID', '=', 'residents.residentPrimeID')
                                            ->where('documentrequests.status','!=','Waiting for approval')
                                            ->where('documentrequests.status','!=','Rejected')
                                            ->where('documentrequests.status','!=','Approved')
                                            ->get();

            return (json_encode($requests));
        }
        else {
            return view('errors.403');
        }
    }

    public function store(Request $r) {
        if ($r->ajax()) {


            $this->validate($r, [
                'requestID' => 'required|unique:documentrequests|max:20',
                'quantity' => 'required|integer|max:8|min:1',
            ]);

            $headRet = Documentrequest::insert([
                "requestID" => trim($r -> input('requestID')), 
                "requestDate" => Carbon::now(), 
                "status" => "Pending",
                "documentsPrimeID" => trim($r -> input('documentsPrimeID')),
                "quantity" => $r -> input('quantity'),
                "residentPrimeID" => trim($r -> input('residentPrimeID'))
            ]);

            $req = Documentrequest::all() -> last();

            $id = Auth::id();
           
            $log = Log::insert(['userID'=>$id,
                                                'action' => 'Requested a document',
                                                'dateOfAction' => Carbon::now(),
                                                'type' => 'Document',
                                                'requestID' => $req-> documentRequestPrimeID]);

            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function view(Request $r) {
        if ($r -> ajax()) {
            $documentFormat = new DocumentFormat();

            $transHead = DocumentHeaderRequest::find($r -> input('documentHeaderPrimeID'));
            $transDetail = DocumentDetailRequest::select("documentDetailPrimeID", "headerPrimeID", "documentPrimeID")
                                                    -> where("headerPrimeID", "=", $r -> input('documentHeaderPrimeID')) 
                                                    -> get()
                                                    -> first();

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
        else {
            return view('errors.403');
        }
    }

    public function checkRequirements(Request $r) {
        if ($r -> ajax()) {
            return json_encode(\DB::table('document_requirements') ->select('primeID','documentPrimeID', 'document_requirements.requirementID', 'quantity','requirements.requirementName') 
                                        ->join('requirements', 'document_requirements.requirementID', '=', 'requirements.requirementID')
                                        ->where('documentPrimeID', '=', $r->input('documentPrimeID')) 
                                        ->get());
        }
        else {
            return view('errors.403');
        }
    }

    public function chkRequirements(Request $r) {
        if ($r -> ajax()) {
            return json_encode(\DB::table('requestrequirements') ->select('requirementID') 
                                        ->where('documentRequestPrimeID', '=', $r->input('documentRequestPrimeID')) 
                                        ->get());
        }
        else {
            return view('errors.403');
        }
    }

    public function requirementsDelete(Request $r) {
        if ($r->ajax()) {
            $requirements = \DB::table('requestrequirements')->where('documentRequestPrimeID', '=', $r->input('documentRequestPrimeID'))->delete();
            return redirect('document');
        }
        else {
            return view('errors.403');
        }
    }

    public function requirementsStore(Request $r){
        if ($r->ajax()) {
            $insertRet = Requestrequirement::insert(['documentRequestPrimeID'=>$r -> input('documentRequestPrimeID'),
                                                'requirementID' => $r -> input('requirementID')]);

            return redirect('document-request');
        }
        else {
            return view('errors.403');
        }
    }

    public function nextPK(Request $r) {
        if ($r->ajax()) {
            $documentRequestPK = Utility::select('docRequestPK')->get()->last();
            $documentRequestPKinc = StaticCounter::smart_next($documentRequestPK->docRequestPK, SmartMove::$NUMBER);
            $lastDocumentRequestID = Documentrequest::all()->last();
            
            if(is_null($lastDocumentRequestID)) {
                return response($documentRequestPKinc);
            }
            else {
                $check = Documentrequest::select('requestID')->where([
                                                                ['requestID','=',$documentRequestPKinc]
                                                                ])->get();
                if($check=='[]') {  
                    return response($documentRequestPKinc); 
                }
                else {
                    $nextValue = StaticCounter::smart_next($lastDocumentRequestID->requestID, SmartMove::$NUMBER);
                    return response($nextValue);     
                }
            }
        }
        else {
            return view('errors.403');
        }
    }

    public function getRequestor(Request $r) {
        if ($r->ajax()) {
            $residents = Resident::select('residentPrimeID', 
                                                'firstName', 
                                                'lastName', 
                                                'middleName', 
                                                'suffix', 
                                                'gender',
                                                'status')
                                            -> where('status','1')
                                            -> get();
            
            return (response($residents));
        }
        else {
            return view('errors.403');
        }
    }

    public function getDocument(Request $r) {
        if ($r->ajax()) {
            $documents = Document::select('primeID', 'documentName', 'status')
                                        -> where('status','1')
                                        -> get();
            return (response($documents));
        }
        else {
            return view('errors.403');
        }
    }

    public function getDocumentID($rowID) {
        
        $documents = Documentrequest::select('documentsPrimeID')
                                    -> where('documentRequestPrimeID','=',$rowID)
                                    -> get();
        return (response($documents));
    
    }

    public function delete(Request $r) {
        if ($r->ajax()) {
            $documentRequest = Documentrequest::find($r -> input('documentRequestPrimeID'));
            $documentRequest -> status = "Cancelled";
            $documentRequest -> save();

            $id = Auth::id();
           
            $log = Log::insert(['userID'=>$id,
                                                'action' => 'Cancelled a document request',
                                                'dateOfAction' => Carbon::now(),
                                                'type' => 'Document',
                                                'requestID' => $r -> input('documentRequestPrimeID')]);

            return redirect('/document-request');
        }
        else {
            return view('errors.403');
        }
    }

    public function waiting(Request $r) {
        if ($r->ajax()) {
            $documentRequest = Documentrequest::find($r -> input('documentRequestPrimeID'));
            $documentRequest -> status = "Waiting for approval";
            $documentRequest -> save();

            return redirect('/document-request');
        }
        else {
            return view('errors.403');
        }
    }
}

class DocumentFormat 
{
    public $documentID = "";
    public $documentName = "";
    public $documentContent = "";
    public $requestorName = "";
}
