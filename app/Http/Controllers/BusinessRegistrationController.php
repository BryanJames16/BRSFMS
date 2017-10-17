<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Businesscategory;
use \App\Models\Resident;
use \App\Models\Businessregistration;
use \Illuminate\Validation\Rule;
use Carbon\Carbon;
use \App\Models\Log;
use Illuminate\Support\Facades\Auth;

class BusinessRegistrationController extends Controller
{
    public function index() {

        $regs = Businessregistration::select('registrationPrimeID', 'businessID','originalName','tradeName', 'residents.residentPrimeID', 
                                                'registrationDate','businessregistrations.address', 'categoryID','categoryName','residents.lastName',
                                                'residents.firstName', 'residents.middleName')
                                                    ->join('businesscategories', 'businessregistrations.categoryID', '=', 'businesscategories.categoryPrimeID')
                                                    ->join('residents', 'businessregistrations.residentPrimeID', '=', 'residents.residentPrimeID')
                                                    -> where('businessregistrations.archive', '=', 0)
                                                    -> get();   

        $regsN = Businessregistration::select('registrationPrimeID', 'businessID','originalName','tradeName',  
                                                'registrationDate','businessregistrations.address', 'categoryID','categoryName','lastName',
                                                'firstName', 'middleName')
                                                    ->join('businesscategories', 'businessregistrations.categoryID', '=', 'businesscategories.categoryPrimeID')
                                                    ->where('businessregistrations.archive', '=', 0)
                                                    ->where('residentPrimeID',null)
                                                    ->get();

        return view('business-registration')-> with('regs', $regs)
                                            -> with('regsN', $regsN);
    }

    public function refresh(Request $r) {
        if ($r -> ajax()) {
            return json_encode(Businessregistration::select('registrationPrimeID', 'businessID','originalName','tradeName', 'residents.residentPrimeID', 
                                                'registrationDate','businessregistrations.address', 'categoryID','categoryName','residents.lastName',
                                                'residents.firstName', 'residents.middleName')
                                                    ->join('businesscategories', 'businessregistrations.categoryID', '=', 'businesscategories.categoryPrimeID')
                                                    ->join('residents', 'businessregistrations.residentPrimeID', '=', 'residents.residentPrimeID')
                                                    -> where('businessregistrations.archive', '=', 0)
                                                    -> get());
        }
        else {
            return view('errors.403');
        }
    }

    public function refreshNonres(Request $r) {
        if ($r -> ajax()) {
            return json_encode(Businessregistration::select('registrationPrimeID', 'businessID','originalName','tradeName',  
                                                'registrationDate','businessregistrations.address', 'categoryID','categoryName','lastName',
                                                'firstName', 'middleName')
                                                    ->join('businesscategories', 'businessregistrations.categoryID', '=', 'businesscategories.categoryPrimeID')
                                                    ->where('businessregistrations.archive', '=', 0)
                                                    ->where('residentPrimeID',null)
                                                    ->get());
        }
        else {
            return view('errors.403');
        }
    }

    public function store(Request $r) {
        if ($r->ajax()) {

            $d = Carbon::now()->addYears(1);

            $insertRet = Businessregistration::insert([
                'businessID' => $r->input('businessID'),
                'originalName' => $r->input('originalName'), 
                'tradeName' => $r->input('tradeName'), 
                'residentPrimeID' => $r->input('residentPrimeID'), 
                'address' => $r->input('address'),
                'firstName' => $r->input('firstName'),
                'middleName' => $r->input('middleName'),
                'lastName' => $r->input('lastName'),
                'gender' => $r->input('gender'),
                'removalDate' => $d,
                'contactNumber' => $r->input('contactNumber'),
                'categoryID' => $r->input('categoryID'),  
                'registrationDate' => Carbon::now()
            ]);
            
            $fam = Businessregistration::all() -> last();

            $id = Auth::id();
           
            $log = Log::insert(['userID'=>$id,
                                                'action' => 'Registered a business',
                                                'dateOfAction' => Carbon::now(),
                                                'type' => 'Business',
                                                'businessID' => $fam -> registrationPrimeID]);

            dd($insertRet);

            

            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function getCategory(Request $r) {
        if ($r -> ajax()) {
            return (BusinessCategory::where("status", "=", 1)
                                ->where("archive", "=", 0)
                                ->get());
        }
        else {
            return view('errors.403');
        }
    }

    public function getOwner(Request $r) {
        if ($r -> ajax()) {
            return (Resident::where("status", "=", "1")->get());
        }
        else {
            return view('errors.403');
        }
    }

    public function check(Request $r) {
        if ($r -> ajax()) {
            return (Businessregistration::where("archive", "=", "0")
                                        ->where('registrationPrimeID',$r->input('registrationPrimeID'))
                                        ->get());
        }
        else {
            return view('errors.403');
        }
    }

    public function getEdit(Request $r) {
        if($r->ajax()) {
            return response(Businessregistration::find($r->registrationPrimeID));
        }
        else {
            return view('errors.403');
        }
    }

    public function delete(Request $r) {
        if ($r->ajax()) {
            $type = Businessregistration::find($r->input('registrationPrimeID'));
            $type->archive = true;
            $type->save();

            $id = Auth::id();
           
            $log = Log::insert(['userID'=>$id,
                                                'action' => 'Deleted a business',
                                                'dateOfAction' => Carbon::now(),
                                                'type' => 'Business',
                                                'businessID' => $r->input('registrationPrimeID')]);
            
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function getDetails(Request $r) {
        if ($r -> ajax()) {
            return json_encode(Businessregistration::select('registrationPrimeID', 'businessID','originalName','tradeName', 'residents.residentPrimeID', 
                                                'registrationDate','businessregistrations.address', 'categoryID','categoryName','residents.lastName',
                                                'residents.firstName', 'residents.middleName','residents.contactNumber','residents.gender')
                                                    ->join('businesscategories', 'businessregistrations.categoryID', '=', 'businesscategories.categoryPrimeID')
                                                    ->join('residents', 'businessregistrations.residentPrimeID', '=', 'residents.residentPrimeID')
                                                    -> where('businessregistrations.archive', '=', 0)
                                                    -> where('businessregistrations.registrationPrimeID', '=', $r->input('registrationPrimeID'))
                                                    -> get());
        }
        else {
            return view('errors.403');
        }   
    }

    public function getDetailsN(Request $r) {
        if ($r -> ajax()) {
            return json_encode(Businessregistration::select('registrationPrimeID', 'businessID','originalName','tradeName', 'residentPrimeID', 
                                                'registrationDate','businessregistrations.address', 'categoryID','categoryName','lastName',
                                                'firstName', 'middleName','contactNumber','gender')
                                                    ->join('businesscategories', 'businessregistrations.categoryID', '=', 'businesscategories.categoryPrimeID')-> where('businessregistrations.archive', '=', 0)
                                                    -> where('businessregistrations.registrationPrimeID', '=', $r->input('registrationPrimeID'))
                                                    -> get());
        }
        else {
            return view('errors.403');
        }   
    }
        
    public function edit(Request $r) { 
        if ($r->ajax()) {
            $this->validate($r, [
                    'originalName' => ['required',  'max:20', Rule::unique('businessregistrations')->ignore($r->input('registrationPrimeID'), 'registrationPrimeID')],
                ]);
                
            $type = Businessregistration::find($r->input('registrationPrimeID'));
            $type->businessID = $r->input('businessID');
            $type->originalName = $r->input('originalName');
            $type->tradeName = $r->input('tradeName');
            $type->residentPrimeID = $r->input('residentPrimeID');
            $type->address = $r->input('address');
            $type->categoryID = $r->input('categoryID');
            $type->firstName = $r->input('firstName');
            $type->middleName = $r->input('middleName');
            $type->lastName = $r->input('lastName');
            $type->gender = $r->input('gender');
            $type->contactNumber = $r->input('contactNumber');
            $type->save();

            $id = Auth::id();
           
            $log = Log::insert(['userID'=>$id,
                                                'action' => 'Edited a business',
                                                'dateOfAction' => Carbon::now(),
                                                'type' => 'Business',
                                                'businessID' => $r->input('registrationPrimeID')]);

            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function getBusiness(Request $r) {
        if ($r -> ajax()) {
            return json_encode(
                Businessregistration::join('residents', 
                                            'residents.residentPrimeID', 
                                            '=', 
                                            'businessregistrations.residentPrimeID') 
                                        ->where("archive", "=", "0")
                                        ->get()
            );
        }
        else {
            return view('errors.403');
        }
    }
}