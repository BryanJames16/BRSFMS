<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Document;
use \Illuminate\Validation\Rule;

class DocumentController extends Controller
{
    public function index() {
    	$documents = Document::select('primeID','documentID', 'documentName','documentDescription','documentType','documentPrice', 'status')
    												-> where([
    															['archive', '=', 0]
    															])
    												-> get();

    	return view('document') -> with('documents', $documents);
    }

    public function refresh(Request $r) {
        if ($r -> ajax()) {
            return json_encode(Document::where("archive", "!=", "1") -> get());
        }
    }

    public function store(Request $r) {

        $this->validate($r, [
            'documentID' => 'required|unique:documents|max:20',
            'documentName' => 'required',
            'documentPrice' => 'required|numeric',
        ]);
        

        if($r -> input('status') == "active") {
            $stat = 1;
        }
        else if($r -> input('status') == "inactive") {
            $stat = 0;
        }
        else {

        }

        $aah = Document::insert(['documentID'=>trim($r -> input('documentID')),
                                            'documentName' => trim($r -> input('documentName')),
                                            'documentDescription' => trim($r -> input('documentDescription')),
                                            'documentType' => $r -> input('documentType'),
                                            'documentPrice' => $r -> input('documentPrice'),
                                               'archive' => 0,
                                               'status' => $stat]);


            return back();
        }

    public function getEdit(Request $r) {
    	
        if($r->ajax()) {
            return response(Document::find($r->primeID));
        }
    }

    public function edit(Request $r) {


        $document = Document::find($r->input('primeID'));
        $document->documentName = $r->input('documentName');
        $document->documentDescription = $r->input('desc');
        $document->documentType = $r->input('type');
        $document->documentPrice = $r->input('documentPrice');
        $document->status = $r->input('stat');
        $document->save();
        return redirect('document');
    }

    public function delete(Request $r) {

        $document = Document::find($r->input('primeID'));
        $document->archive = true;
        $document->save();
        return redirect('document');   
        
    }


}
