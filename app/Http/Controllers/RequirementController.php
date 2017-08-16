<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Requirement;
use \App\Models\Document;

class RequirementController extends Controller
{
   public function index() {
 
        $requirements= \DB::table('requirements') ->select('requirementID','requirementName', 'requirementDesc','status','archive')
                                        ->where('archive', '=', 0) 
                                        ->get();

        return view('requirement')-> with('requirements', $requirements);
    }

    public function store(Request $r) {
        if ($r->ajax()) {
            $stat = 0;
            
            $this->validate($r, [
                'requirementName' => 'required|max:30',
            ]);

            if($r->input('status') == "active")
            {
                $stat = 1;
            }
            else if($r->input('status') == "inactive")
            {
                $stat = 0;
            }
            else
            {

            }

            $insertRet = Requirement::insert(['requirementName'=>trim($r->requirementName),
                                                'requirementDesc'=>trim($r->requirementDesc),
                                                'archive'=>0,
                                                'status'=>$stat]);
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function refresh(Request $r) {
        if ($r -> ajax()) {
            $requirements = \DB::table('requirements') ->select('requirementID', 'requirementName', 'requirementDesc', 'status')
                                        ->where('archive', '=', 0) 
                                        ->get();

            return json_encode($requirements);
        }
        else {
            return view('errors.403');
        }
    }

    public function getEdit(Request $r) {
        if($r->ajax()) {
            return response(Requirement::find($r->input('requirementID')));
        }
        else {
            return view('errors.403');
        }
    }

    public function edit(Request $r) {
        if ($r->ajax()) {
            $requirement = Requirement::find($r->input('requirementID'));
            $requirement->requirementName = $r->input('requirementName');
            $requirement->requirementDesc = $r->input('requirementDesc');
            $requirement->status = $r->input('status');
            $requirement->save();
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function delete(Request $r) {
        if ($r->ajax()) {
            $requirement = Requirement::find($r->input('requirementID'));
            $requirement->archive = true;
            $requirement->save();
            return back();
        }
        else {
            return view('errors.403');
        }
    }
}
