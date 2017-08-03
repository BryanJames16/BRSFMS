<?php

namespace App\Models;

class Lot extends \App\Models\Base\Lot
{
	protected $fillable = [
		'lotCode',
		'streetID',
		'status',
		'archive'
	];
}
