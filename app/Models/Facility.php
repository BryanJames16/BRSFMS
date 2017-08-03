<?php

namespace App\Models;

class Facility extends \App\Models\Base\Facility
{
	protected $fillable = [
		'facilityID',
		'facilityName',
		'facilityDesc',
		'status',
		'archive',
		'facilityTypeID',
		'facilityDayPrice',
		'facilityNightPrice'
	];
}
