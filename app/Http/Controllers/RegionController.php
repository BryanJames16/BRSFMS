<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Region;

class RegionController extends Controller
{
    public function index() {
    	$regions = Region::select('regionID', 'regionName', 'regionNumber', 'status')
    												-> where([
    															['isArchive', '=', 0], 
    															['status', '=', 1]
    															])
    												-> get();

    	return view('region') -> with('regions', $regions);
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
