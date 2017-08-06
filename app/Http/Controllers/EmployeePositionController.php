<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Employeeposition;

class EmployeePositionController extends Controller
{
    public function index() {
    	$employeePositions = Employeeposition::select('positionID', 'positionDescription', 'status')
    												-> where([
    															['isArchive', '=', 0], 
    															['status', '=', 1]
    															])
    												-> get();

    	return view('employee-position') -> with('employeePositions', $employeePositions);
    }

    public function create() {
    	$employeePosition = new Employeeposition;
    	return view('employee-position', ['employeePosition' => $employeePosition]);
    }

    public function edit(Request $request, $id) {
    	if ($request -> ajax()) {
    		$facilityTypeID = FacilityType::findOrFail($id);
    		$title = "Edit FacilityType";

    		return view('facility-type.index');
    	}
    	else {
    		return (redurect(route('facility-type.index')));
    	}
    }
}
