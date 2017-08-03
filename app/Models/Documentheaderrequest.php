<?php

namespace App\Models;

class Documentheaderrequest extends \App\Models\Base\Documentheaderrequest
{
	protected $fillable = [
		'requestID',
		'requestDate',
		'status',
		'peoplePrimeID'
	];
}
