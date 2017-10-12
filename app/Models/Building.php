<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 12 Oct 2017 23:36:11 +0800.
 */

namespace App\Models;

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
 * @package App\Models
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

	protected $fillable = [
		'lotID',
		'buildingName',
		'buildingTypeID',
		'status',
		'archive'
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
