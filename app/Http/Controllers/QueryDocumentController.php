<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Document;
use \App\Models\Documentrequest;
use Carbon\Carbon;

require_once(app_path() . '/Includes/pktool.php');

use StaticCounter;
use SmartMove;

class QueryDocumentController extends Controller
{

    

    public function index() {
    	$documents = Document::select('primeID','documentName')
    												-> where('status','1')
                                                    -> where('archive','0')
                                                    -> get();
        
        
    	return view('query-document')-> with('documents',$documents);
    }

    public function getQuery(Request $r) {
        if ($r -> ajax()) {
            return json_encode(\DB::table('documentrequests') ->select('documentRequestPrimeID','requestID','requestDate',
                                                                'documentrequests.status','residents.lastName','residents.middleName',
                                                                'residents.firstName',
                                                                'quantity','documentName')
    												->join('documents', 'documentrequests.documentsPrimeID', '=', 'documents.primeID')
                                                    ->join('residents', 'documentrequests.residentPrimeID', '=', 'residents.residentPrimeID')
                                                    -> where('residents.lastName','like','%'.$r->input('lastName').'%')
                                                    -> where('residents.firstName','like','%'.$r->input('firstName').'%')
                                                    -> where('residents.middleName','like','%'.$r->input('middleName').'%')
                                                    -> where('documentsPrimeID','like','%'.$r->input('documentsPrimeID').'%')
                                                    -> where('residents.gender','like','%'.$r->input('gender').'%')
                                                    -> where('quantity','like','%'.$r->input('quantity').'%')
                                                    -> where('documentrequests.status','like','%'.$r->input('status').'%')
                                                    -> where('requestDate','like','%'.$r->input('requestDate').'%')
                                                    -> get());
        }
        else {
            return view('errors.403');
        }
    }

	
    public function getEdit(Request $r) {
        if($r->ajax()) {
            return json_encode(\DB::table('residents') ->select('registrationPrimeID','businessID','originalName', 
                                                                'residents.firstName','residents.lastName','residents.middleName',
                                                                'tradeName','registrationDate', 'address', 
                                                                'residents.gender', 
                                                                'businesscategories.categoryName') 
                                        ->join('businesscategories', 'businessregistrations.categoryID', '=', 'businesscategories.categoryPrimeID')
                                        ->join('residents', 'businessregistrations.residentPrimeID', '=', 'residents.residentPrimeID')
                                        ->where('generaladdresses.residentPrimeID', '=', $r->input('registrationPrimeID'))
                                        ->get());
        }
        else {
            return view('errors.403');
        }

    }

  
}

