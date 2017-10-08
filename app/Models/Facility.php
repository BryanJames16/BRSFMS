<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 08 Oct 2017 10:41:00 +0800.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Facility
 * 
 * @property int $primeID
 * @property string $facilityID
 * @property string $facilityName
 * @property string $facilityDesc
 * @property bool $status
 * @property bool $archive
 * @property int $facilityTypeID
 * @property float $facilityDayPrice
 * @property float $facilityNightPrice
 * 
 * @property \App\Models\Facilitytype $facilitytype
 * @property \Illuminate\Database\Eloquent\Collection $reservations
 *
 * @package App\Models
 */
class Facility extends Eloquent
{
	protected $primaryKey = 'primeID';
	public $timestamps = false;

	protected $casts = [
		'status' => 'bool',
		'archive' => 'bool',
		'facilityTypeID' => 'int',
		'facilityDayPrice' => 'float',
		'facilityNightPrice' => 'float'
	];

	protected $fillable = [
		'facilityID',
		'facilityName',
		'facilityDesc',
		'status',
		'archive',
		'facilityTypeID',
		'facilityDayPrice',
		'facilityNightPrice'
	];

	public function facilitytype()
	{
		return $this->belongsTo(\App\Models\Facilitytype::class, 'facilityTypeID');
	}

	public function reservations()
	{
		return $this->hasMany(\App\Models\Reservation::class, 'facilityPrimeID');
	}
}
