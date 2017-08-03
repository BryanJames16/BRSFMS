<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 03 Aug 2017 10:35:25 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Business
 * 
 * @property int $businessPrimeID
 * @property string $businessID
 * @property string $businessName
 * @property string $businessDesc
 * @property string $businessType
 * @property int $categoryPrimeID
 * @property bool $status
 * @property bool $archive
 * 
 * @property \App\Models\Businesscategory $businesscategory
 * @property \Illuminate\Database\Eloquent\Collection $businessregistrations
 * @property \Illuminate\Database\Eloquent\Collection $generaladdresses
 *
 * @package App\Models\Base
 */
class Business extends Eloquent
{
	protected $primaryKey = 'businessPrimeID';
	public $timestamps = false;

	protected $casts = [
		'categoryPrimeID' => 'int',
		'status' => 'bool',
		'archive' => 'bool'
	];

	public function businesscategory()
	{
		return $this->belongsTo(\App\Models\Businesscategory::class, 'categoryPrimeID');
	}

	public function businessregistrations()
	{
		return $this->hasMany(\App\Models\Businessregistration::class, 'businessPrimeID');
	}

	public function generaladdresses()
	{
		return $this->hasMany(\App\Models\Generaladdress::class, 'businessPrimeID');
	}
}
