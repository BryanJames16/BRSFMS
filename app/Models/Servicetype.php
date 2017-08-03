<?php

namespace App\Models;

class Servicetype extends \App\Models\Base\Servicetype
{
	protected $fillable = [
		'typeName',
		'typeDesc',
		'status',
		'archive'
	];
}
