<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Recipient;
use \Illuminate\Validation\Rule;

class RecipientController extends Controller
{
    public function index() {
    	$facilityTypes = Recipient::select('recipientID', 'recipientName', 'status')
    												-> where([
    															['archive', '=', 0]
    															])
    												-> get();

    	return view('recipient') -> with('facilityTypes', $facilityTypes);
    }

    public function refresh(Request $r) {
        if ($r -> ajax()) {
            return json_encode(Recipient::where("archive", "!=", "1") -> get());
        }
        else {
            return view('errors.403');
        }
    }

    public function store(Request $r) {
        if ($r->ajax()) {
            $stat = 0;

            $this->validate($r, [
                'recipientName' => 'required|unique:recipients|max:30',
            ]);

            if($r -> input('status') =="active") {
                $stat = 1;
            }
            else if($r -> input('status') =="inactive") {
                $stat = 0;
            }
            else {
                
            }

            $aah = Recipient::insert(['recipientName'=>trim($r->recipientName),
                                                'archive'=>0,
                                                'status'=>$stat]);
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function getEdit(Request $r) {
        if ($r -> ajax()) {
            return response(Recipient::find($r->input('recipientID')));
        }
        else {
            return view('errors.403');
        }
    }

    public function edit(Request $r) {
        if ($r->ajax()) {
            $this->validate($r, [
                'recipientName' => ['required',  'max:30', Rule::unique('recipients')->ignore($r->input('recipientID'), 'recipientID')],
            ]);

            $type = Recipient::find($r->input('recipientID'));
            $type->recipientName = $r->input('recipientName');
            $type->status = $r->input('stat');
            $type->save();
            return redirect('recipient');
        }
        else {
            return view('errors.403');
        }
    }

    public function delete(Request $r) {
        if ($r->ajax()) {
            $type = Recipient::find($r->input('recipientID'));
            $type->archive = true;
            $type->save();
            return redirect('recipient');
        }
        else {
            return view('errors.403');
        }
    }

}
