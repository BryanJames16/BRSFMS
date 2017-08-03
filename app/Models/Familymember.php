<?php

namespace App\Models;

class Familymember extends \App\Models\Base\Familymember
{
	protected $fillable = [
		'familyPrimeID',
		'peoplePrimeID',
		'memberRelation',
		'archive'
	];
}
