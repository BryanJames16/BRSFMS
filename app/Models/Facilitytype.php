<?php

namespace App\Models;

class Facilitytype extends \App\Models\Base\Facilitytype
{
	protected $fillable = [
		'typeName',
		'status',
		'archive'
	];
}
