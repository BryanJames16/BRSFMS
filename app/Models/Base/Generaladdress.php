<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 03 Aug 2017 10:35:25 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Generaladdress
 * 
 * @property int $personAddressID
 * @property string $addressType
 * @property int $residentPrimeID
 * @property int $facilitiesPrimeID
 * @property int $businessPrimeID
 * @property int $unitID
 * @property int $streetID
 * @property int $lotID
 * @property int $buildingID
 * 
 * @property \App\Models\Business $business
 * @property \App\Models\Facility $facility
 * @property \App\Models\Resident $resident
 * @property \App\Models\Street $street
 * @property \App\Models\Unit $unit
 *
 * @package App\Models\Base
 */
class Generaladdress extends Eloquent
{
	protected $primaryKey = 'personAddressID';
	public $timestamps = false;

	protected $casts = [
		'residentPrimeID' => 'int',
		'facilitiesPrimeID' => 'int',
		'businessPrimeID' => 'int',
		'unitID' => 'int',
		'streetID' => 'int',
		'lotID' => 'int',
		'buildingID' => 'int'
	];

	public function business()
	{
		return $this->belongsTo(\App\Models\Business::class, 'businessPrimeID');
	}

	public function facility()
	{
		return $this->belongsTo(\App\Models\Facility::class, 'facilitiesPrimeID');
	}

	public function resident()
	{
		return $this->belongsTo(\App\Models\Resident::class, 'residentPrimeID');
	}

	public function street()
	{
		return $this->belongsTo(\App\Models\Street::class, 'streetID');
	}

	public function unit()
	{
		return $this->belongsTo(\App\Models\Unit::class, 'unitID');
	}
}
