<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Businesscategory;
use \App\Models\Resident;
use \App\Models\Businessregistration;
use \Illuminate\Validation\Rule;
use Carbon\Carbon;

class BusinessRegistrationController extends Controller
{
    public function index() {

        $regs = Businessregistration::select('registrationPrimeID', 'businessID','originalName','tradeName', 'residents.residentPrimeID', 
                                                'registrationDate','address', 'categoryID','categoryName','residents.lastName',
                                                'residents.firstName', 'residents.middleName')
                                                    ->join('businesscategories', 'businessregistrations.categoryID', '=', 'businesscategories.categoryPrimeID')
                                                    ->join('residents', 'businessregistrations.residentPrimeID', '=', 'residents.residentPrimeID')
                                                    -> where('businessregistrations.archive', '=', 0)
                                                    -> get();

        return view('business-registration')-> with('regs', $regs);
    }

    public function refresh(Request $r) {
        if ($r -> ajax()) {
            return json_encode(Businessregistration::select('registrationPrimeID', 'businessID','originalName','tradeName', 'residents.residentPrimeID', 
                                                'registrationDate','address', 'categoryID','categoryName','residents.lastName',
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

    public function store(Request $r) {
        if ($r->ajax()) {
            $insertRet = Businessregistration::insert([
                'businessID' => $r->input('businessID'),
                'originalName' => $r->input('originalName'), 
                'tradeName' => $r->input('tradeName'), 
                'residentPrimeID' => $r->input('residentPrimeID'), 
                'address' => $r->input('address'),
                'categoryID' => $r->input('categoryID'),  
                'registrationDate' => Carbon::now()
            ]);
            
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
            
            return back();
        }
        else {
            return view('errors.403');
        }
    }

    public function getDetails(Request $r) {
        if ($r -> ajax()) {
            return json_encode(Businessregistration::select('registrationPrimeID', 'businessID','originalName','tradeName', 'residents.residentPrimeID', 
                                                'registrationDate','address', 'categoryID','categoryName','residents.lastName',
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
            $type->save();

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