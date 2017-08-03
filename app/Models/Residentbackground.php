<?php

namespace App\Models;

class Residentbackground extends \App\Models\Base\Residentbackground
{
	protected $fillable = [
		'currentWork',
		'monthlyIncome',
		'dateStarted',
		'peoplePrimeID',
		'status',
		'archive'
	];
}
