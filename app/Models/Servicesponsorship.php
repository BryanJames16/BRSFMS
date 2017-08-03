<?php

namespace App\Models;

class Servicesponsorship extends \App\Models\Base\Servicesponsorship
{
	protected $fillable = [
		'sponsorshipDate',
		'servicePrimeID',
		'peoplePrimeID',
		'startOfImplementation',
		'endOfImplementation'
	];
}
