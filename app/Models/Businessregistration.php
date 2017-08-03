<?php

namespace App\Models;

class Businessregistration extends \App\Models\Base\Businessregistration
{
	protected $fillable = [
		'registrationID',
		'registrationDate',
		'businessPrimeID',
		'peoplePrimeID'
	];
}
