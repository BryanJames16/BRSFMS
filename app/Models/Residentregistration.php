<?php

namespace App\Models;

class Residentregistration extends \App\Models\Base\Residentregistration
{
	protected $fillable = [
		'registrationDate',
		'employeePrimeID',
		'peoplePrimeID'
	];
}
