<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 20 Aug 2017 15:08:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Collection
 * 
 * @property int $collectionPrimeID
 * @property string $collectionID
 * @property \Carbon\Carbon $collectionDate
 * @property int $collectionType
 * @property float $amount
 * @property string $status
 * @property int $reservationprimeID
 * @property int $documentHeaderPrimeID
 * @property int $residentPrimeID
 * @property int $peoplePrimeID
 * 
 * @property \App\Models\Documentheaderrequest $documentheaderrequest
 * @property \App\Models\Person $person
 * @property \App\Models\Reservation $reservation
 * @property \App\Models\Resident $resident
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
		'reservationprimeID' => 'int',
		'documentHeaderPrimeID' => 'int',
		'residentPrimeID' => 'int',
		'peoplePrimeID' => 'int'
	];

	protected $dates = [
		'collectionDate'
	];

	protected $fillable = [
		'collectionID',
		'collectionDate',
		'collectionType',
		'amount',
		'status',
		'reservationprimeID',
		'documentHeaderPrimeID',
		'residentPrimeID',
		'peoplePrimeID'
	];

	public function documentheaderrequest()
	{
		return $this->belongsTo(\App\Models\Documentheaderrequest::class, 'documentHeaderPrimeID');
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
}
