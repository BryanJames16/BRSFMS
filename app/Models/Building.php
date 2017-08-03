<?php

namespace App\Models;

class Building extends \App\Models\Base\Building
{
	protected $fillable = [
		'lotID',
		'buildingName',
		'buildingTypeID',
		'status',
		'archive'
	];
}
