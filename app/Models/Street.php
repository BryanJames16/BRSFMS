<?php

namespace App\Models;

class Street extends \App\Models\Base\Street
{
	protected $fillable = [
		'streetName',
		'status',
		'archive'
	];
}
