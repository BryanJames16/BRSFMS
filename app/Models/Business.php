<?php

namespace App\Models;

class Business extends \App\Models\Base\Business
{
	protected $fillable = [
		'businessID',
		'businessName',
		'businessDesc',
		'businessType',
		'categoryPrimeID',
		'status',
		'archive'
	];
}
