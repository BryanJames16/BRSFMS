<?php

namespace App\Models;

class Resident extends \App\Models\Base\Resident
{
	protected $fillable = [
		'residentID',
		'firstName',
		'middleName',
		'lastName',
		'suffix',
		'contactNumber',
		'gender',
		'birthDate',
		'civilStatus',
		'seniorCitizenID',
		'disabilities',
		'residentType',
		'status'
	];
}
