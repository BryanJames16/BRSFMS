<?php

namespace App\Models;

class Unit extends \App\Models\Base\Unit
{
	protected $fillable = [
		'unitCode',
		'status',
		'archive',
		'buildingID'
	];
}
