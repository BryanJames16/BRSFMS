<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 05 Oct 2017 15:30:40 +0800.
 */

namespace App\Models;

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
 * @property \App\Models\Facility $facility
 * @property \App\Models\Resident $resident
 * @property \App\Models\Businessregistration $businessregistration
 * @property \App\Models\Street $street
 * @property \App\Models\Unit $unit
 *
 * @package App\Models
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

	protected $fillable = [
		'addressType',
		'residentPrimeID',
		'facilitiesPrimeID',
		'businessPrimeID',
		'unitID',
		'streetID',
		'lotID',
		'buildingID'
	];

	public function facility()
	{
		return $this->belongsTo(\App\Models\Facility::class, 'facilitiesPrimeID');
	}

	public function resident()
	{
		return $this->belongsTo(\App\Models\Resident::class, 'residentPrimeID');
	}

	public function businessregistration()
	{
		return $this->belongsTo(\App\Models\Businessregistration::class, 'businessPrimeID');
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
