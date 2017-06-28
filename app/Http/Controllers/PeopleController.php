<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Person;
use App\Http\Controllers\Controller;
use \Illuminate\Validation\Rule;

class PeopleController extends Controller
{
    public function index() {
    	$people = Person::select('peoplePrimeID','personID', 'firstName','middlename','lastname','suffix','contactNumber','gender','birthdate', 'status')
    												-> where([
    															['archive', '=', 0]
    															])
    												-> get();

    	return view('person') -> with('people', $people);
    }

    public function store(Request $r) {

        $this->validate($r, [
        
        'personID' => 'required|unique:people|max:30',
        'firstname' => 'required',
        'lastname' => 'required',
        'birthdate' => 'required|date',
        ]);
        

        if($_POST['stat']=="active")
        {
            $stat = 1;
        }
        else if($_POST['stat']=="inactive")
        {
            $stat = 0;
        }

        $aah = Person::insert(['personID'=>trim($r->personID),
                                            'firstname'=>trim($r->firstname),
                                            'middlename'=>trim($r->middlename),
                                            'lastname'=>trim($r->lastname),
                                            'suffix'=>trim($r->suffix),
                                            'birthdate'=>$r->birthdate,
                                            'contactNumber'=>trim($r->contactNumber),
                                            'gender'=>'M',
                                               'archive'=>0,
                                               'status'=>$stat]);


            return back();
        }

    public function getEdit(Request $r) {
    	
        if($r->ajax())
        {
            //echo "<script>alert('entered')</script>";
            //return null;
            return response(Person::find($r->peoplePrimeID));
        }


    }

    public function edit(Request $r)
    {


        $person = Person::find($r->input('peoplePrimeID'));
        $person->firstName = $r->input('person_firstname');
        $person->middleName = $r->input('person_middlename');
        $person->lastName = $r->input('person_lastname');
        $person->suffix = $r->input('person_suffix');
        $person->contactNumber = $r->input('contactNumber');
        $person->birthdate = $r->input('birthdate');

        if($r->input('gender')=='Male')
        {
            $g = 'M';
        }
        else
        {
            $g = 'F';
        }

        $person->gender = $g;
        $person->status = $r->input('stat');
        $person->save();
        return redirect('person');
    }

    public function delete(Request $r)
    {

        $person = Person::find($r->input('peoplePrimeID'));
        $person->archive = true;
        $person->save();
        return redirect('person');
    }

}
