<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 03 Aug 2017 10:35:25 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Building
 * 
 * @property int $buildingID
 * @property int $lotID
 * @property string $buildingName
 * @property int $buildingTypeID
 * @property bool $status
 * @property bool $archive
 * 
 * @property \App\Models\Buildingtype $buildingtype
 * @property \App\Models\Lot $lot
 * @property \Illuminate\Database\Eloquent\Collection $units
 *
 * @package App\Models\Base
 */
class Building extends Eloquent
{
	protected $primaryKey = 'buildingID';
	public $timestamps = false;

	protected $casts = [
		'lotID' => 'int',
		'buildingTypeID' => 'int',
		'status' => 'bool',
		'archive' => 'bool'
	];

	public function buildingtype()
	{
		return $this->belongsTo(\App\Models\Buildingtype::class, 'buildingTypeID');
	}

	public function lot()
	{
		return $this->belongsTo(\App\Models\Lot::class, 'lotID');
	}

	public function units()
	{
		return $this->hasMany(\App\Models\Unit::class, 'buildingID');
	}
}
