<?php

namespace App\Models;

class Generaladdress extends \App\Models\Base\Generaladdress
{
	protected $fillable = [
		'addressType',
		'residentPrimeID',
		'facilitiesPrimeID',
		'businessPrimeID',
		'unitID',
		'streetID',
		'lotID',
		'buildingID'
	];
}
