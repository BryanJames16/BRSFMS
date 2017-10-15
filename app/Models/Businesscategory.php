<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 16 Oct 2017 10:06:21 +0800.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Businesscategory
 * 
 * @property int $categoryPrimeID
 * @property string $categoryName
 * @property string $categoryDesc
 * @property bool $status
 * @property bool $archive
 * 
 * @property \Illuminate\Database\Eloquent\Collection $businesses
 * @property \Illuminate\Database\Eloquent\Collection $businessregistrations
 *
 * @package App\Models
 */
class Businesscategory extends Eloquent
{
	protected $primaryKey = 'categoryPrimeID';
	public $timestamps = false;

	protected $casts = [
		'status' => 'bool',
		'archive' => 'bool'
	];

	protected $fillable = [
		'categoryName',
		'categoryDesc',
		'status',
		'archive'
	];

	public function businesses()
	{
		return $this->hasMany(\App\Models\Business::class, 'categoryPrimeID');
	}

	public function businessregistrations()
	{
		return $this->hasMany(\App\Models\Businessregistration::class, 'categoryID');
	}
}
