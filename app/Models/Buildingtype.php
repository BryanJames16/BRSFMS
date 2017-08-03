<?php

namespace App\Models;

class Buildingtype extends \App\Models\Base\Buildingtype
{
	protected $fillable = [
		'buildingTypeName',
		'status',
		'archive'
	];
}
