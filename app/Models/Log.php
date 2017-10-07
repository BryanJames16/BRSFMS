<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 05 Oct 2017 15:30:41 +0800.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Log
 * 
 * @property int $logID
 * @property int $userID
 * @property string $action
 * @property int $resID
 * @property int $famID
 * @property int $requestID
 * @property int $reservationID
 * @property int $collectionID
 * @property int $servTransactionPrimeID
 * @property int $businessID
 * @property \Carbon\Carbon $dateOfAction
 * @property string $type
 * 
 * @property \App\Models\Businessregistration $businessregistration
 * @property \App\Models\Collection $collection
 * @property \App\Models\Family $family
 * @property \App\Models\Documentrequest $documentrequest
 * @property \App\Models\Resident $resident
 * @property \App\Models\Reservation $reservation
 * @property \App\Models\Servicetransaction $servicetransaction
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Log extends Eloquent
{
	protected $primaryKey = 'logID';
	public $timestamps = false;

	protected $casts = [
		'userID' => 'int',
		'resID' => 'int',
		'famID' => 'int',
		'requestID' => 'int',
		'reservationID' => 'int',
		'collectionID' => 'int',
		'servTransactionPrimeID' => 'int',
		'businessID' => 'int'
	];

	protected $dates = [
		'dateOfAction'
	];

	protected $fillable = [
		'userID',
		'action',
		'resID',
		'famID',
		'requestID',
		'reservationID',
		'collectionID',
		'servTransactionPrimeID',
		'businessID',
		'dateOfAction',
		'type'
	];

	public function businessregistration()
	{
		return $this->belongsTo(\App\Models\Businessregistration::class, 'businessID');
	}

	public function collection()
	{
		return $this->belongsTo(\App\Models\Collection::class, 'collectionID');
	}

	public function family()
	{
		return $this->belongsTo(\App\Models\Family::class, 'famID');
	}

	public function documentrequest()
	{
		return $this->belongsTo(\App\Models\Documentrequest::class, 'requestID');
	}

	public function resident()
	{
		return $this->belongsTo(\App\Models\Resident::class, 'resID');
	}

	public function reservation()
	{
		return $this->belongsTo(\App\Models\Reservation::class, 'reservationID');
	}

	public function servicetransaction()
	{
		return $this->belongsTo(\App\Models\Servicetransaction::class, 'servTransactionPrimeID');
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'userID');
	}
}
