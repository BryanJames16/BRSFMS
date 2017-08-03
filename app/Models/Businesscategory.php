<?php

namespace App\Models;

class Businesscategory extends \App\Models\Base\Businesscategory
{
	protected $fillable = [
		'categoryName',
		'categoryDesc',
		'status',
		'archive'
	];
}
