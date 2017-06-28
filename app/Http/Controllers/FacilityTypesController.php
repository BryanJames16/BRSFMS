<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Facilitytype;

class FacilityTypesController extends Controller
{
	public function jquery()
	{
		return view('facilitytype.facilitytype');
	}

	public function readByAjax()
	{
		$facilitytype = FacilityType::select('typeName', 'typeID','status','archive')
					->get();

		return view('facilitytype.facilitytyperead',compact('facilitytype'));
	}

	public function postJquery(Request $r)
	{
		if($r->ajax())
		{

			$facilitytype = new FacilityType();
			$facilitytype['typeName'] = $r->typeName;
			$facilitytype['status'] = 1;
			$facilitytype['archive'] = 0;
			
			try {
				if($facilitytype->save())
				{
					echo  "<script>alert('Successfully added!')</script>";
					return response(['msg'=>'inserted successfully']);
				}
				else {
					echo "<script>alert('Enetered Else');</script>";
				}
			}
			catch (Exception $exp) {
				echo "<script>console.log('Exception Caught: $exp');</script>";
			}

			


		}
	}
	/*



	public function getEditAjax(Request $r)
	{
		if($r->ajax())
		{
			return response(Facility::find($r->id));
		}
	}

	public function updateByAjax(Request $r)
	{
		if($r->ajax())
		{
			$facilities = Facility::find($r->primeID);
			
			$facilities['facilityName']=$r['facility'];
			$facilities['facilityDesc']=$r['desc'];
			$facilities['facilityDayPrice']=$r['day'];
			$facilities['facilityNightPrice']=$r['night'];
			$facilities['facilityTypeID']=$r['role_id'];
			$facilities['facilityID']=$r['id'];
			$facilities->save();

			return response(['msg'=>'Update successfully']);

		}
	}
	*/
}