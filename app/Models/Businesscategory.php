<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 24 Aug 2017 11:11:01 +0000.
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
}
