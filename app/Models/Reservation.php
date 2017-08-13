<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 13 Aug 2017 04:58:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Reservation
 * 
 * @property int $primeID
 * @property string $reservationName
 * @property string $reservationDescription
 * @property \Carbon\Carbon $reservationStart
 * @property \Carbon\Carbon $reservationEnd
 * @property \Carbon\Carbon $dateReserved
 * @property int $peoplePrimeID
 * @property int $facilityPrimeID
 * @property string $status
 * 
 * @property \App\Models\Facility $facility
 * @property \App\Models\Person $person
 *
 * @package App\Models
 */
class Reservation extends Eloquent
{
	protected $primaryKey = 'primeID';
	public $timestamps = false;

	protected $casts = [
		'peoplePrimeID' => 'int',
		'facilityPrimeID' => 'int'
	];

	protected $dates = [
		'reservationStart',
		'reservationEnd',
		'dateReserved'
	];

	protected $fillable = [
		'reservationName',
		'reservationDescription',
		'reservationStart',
		'reservationEnd',
		'dateReserved',
		'peoplePrimeID',
		'facilityPrimeID',
		'status'
	];

	public function facility()
	{
		return $this->belongsTo(\App\Models\Facility::class, 'facilityPrimeID');
	}

	public function person()
	{
		return $this->belongsTo(\App\Models\Person::class, 'peoplePrimeID');
	}
}
