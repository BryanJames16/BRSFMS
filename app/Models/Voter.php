<?php

namespace App\Models;

class Voter extends \App\Models\Base\Voter
{
	protected $fillable = [
		'votersID',
		'datVoter',
		'peoplePrimeID',
		'status',
		'archive'
	];
}
