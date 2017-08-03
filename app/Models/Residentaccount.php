<?php

namespace App\Models;

class Residentaccount extends \App\Models\Base\Residentaccount
{
	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'accountID',
		'username',
		'password',
		'accessCode',
		'status',
		'archive',
		'peoplePrimeID'
	];
}
