<?php

namespace App\Models;

class Employeeposition extends \App\Models\Base\Employeeposition
{
	protected $fillable = [
		'positionName',
		'positionDate',
		'positionLevel',
		'status',
		'archive',
		'employeePrimeID'
	];
}
