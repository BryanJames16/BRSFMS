<?php

namespace App\Models;

class Family extends \App\Models\Base\Family
{
	protected $fillable = [
		'familyID',
		'familyHeadID',
		'familyName',
		'familyRegistrationDate',
		'archive'
	];
}
