<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 21 Sep 2017 08:26:11 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Collection
 * 
 * @property int $collectionPrimeID
 * @property string $collectionID
 * @property \Carbon\Carbon $collectionDate
 * @property \Carbon\Carbon $paymentDate
 * @property int $collectionType
 * @property float $amount
 * @property float $recieved
 * @property string $status
 * @property int $reservationprimeID
 * @property int $documentHeaderPrimeID
 * @property int $residentPrimeID
 * @property int $peoplePrimeID
 * 
 * @property \App\Models\Documentrequest $documentrequest
 * @property \App\Models\Person $person
 * @property \App\Models\Reservation $reservation
 * @property \App\Models\Resident $resident
 * @property \Illuminate\Database\Eloquent\Collection $logs
 *
 * @package App\Models
 */
class Collection extends Eloquent
{
	protected $primaryKey = 'collectionPrimeID';
	public $timestamps = false;

	protected $casts = [
		'collectionType' => 'int',
		'amount' => 'float',
		'recieved' => 'float',
		'reservationprimeID' => 'int',
		'documentHeaderPrimeID' => 'int',
		'residentPrimeID' => 'int',
		'peoplePrimeID' => 'int'
	];

	protected $dates = [
		'collectionDate',
		'paymentDate'
	];

	protected $fillable = [
		'collectionID',
		'collectionDate',
		'paymentDate',
		'collectionType',
		'amount',
		'recieved',
		'status',
		'reservationprimeID',
		'documentHeaderPrimeID',
		'residentPrimeID',
		'peoplePrimeID'
	];

	public function documentrequest()
	{
		return $this->belongsTo(\App\Models\Documentrequest::class, 'documentHeaderPrimeID');
	}

	public function person()
	{
		return $this->belongsTo(\App\Models\Person::class, 'peoplePrimeID');
	}

	public function reservation()
	{
		return $this->belongsTo(\App\Models\Reservation::class, 'reservationprimeID');
	}

	public function resident()
	{
		return $this->belongsTo(\App\Models\Resident::class, 'residentPrimeID');
	}

	public function logs()
	{
		return $this->hasMany(\App\Models\Log::class, 'collectionID');
	}
}
