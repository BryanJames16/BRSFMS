<?php

namespace App\Models;

class Service extends \App\Models\Base\Service
{
	protected $fillable = [
		'serviceID',
		'serviceName',
		'serviceDesc',
		'typeID',
		'status',
		'archive'
	];
}
