<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 15 Oct 2017 18:14:51 +0800.
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
 * @property string $eventStatus
 * @property int $peoplePrimeID
 * @property int $facilityPrimeID
 * @property string $status
 * @property string $name
 * @property int $age
 * @property string $email
 * @property string $contactNumber
 * 
 * @property \App\Models\Facility $facility
 * @property \App\Models\Resident $resident
 * @property \Illuminate\Database\Eloquent\Collection $collections
 * @property \Illuminate\Database\Eloquent\Collection $logs
 *
 * @package App\Models
 */
class Reservation extends Eloquent
{
	protected $primaryKey = 'primeID';
	public $timestamps = false;

	protected $casts = [
		'peoplePrimeID' => 'int',
		'facilityPrimeID' => 'int',
		'age' => 'int'
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
		'eventStatus',
		'peoplePrimeID',
		'facilityPrimeID',
		'status',
		'name',
		'age',
		'email',
		'contactNumber'
	];

	public function facility()
	{
		return $this->belongsTo(\App\Models\Facility::class, 'facilityPrimeID');
	}

	public function resident()
	{
		return $this->belongsTo(\App\Models\Resident::class, 'peoplePrimeID');
	}

	public function collections()
	{
		return $this->hasMany(\App\Models\Collection::class, 'reservationprimeID');
	}

	public function logs()
	{
		return $this->hasMany(\App\Models\Log::class, 'reservationID');
	}
}
