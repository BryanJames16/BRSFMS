<?php

namespace App\Models;

class Employee extends \App\Models\Base\Employee
{
	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'employeeID',
		'registrationID',
		'username',
		'password',
		'status',
		'archive'
	];
}
