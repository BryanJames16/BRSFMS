<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 20 Aug 2017 12:36:51 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Collection
 * 
 * @property int $collectionPrimeID
 * @property string $collectionID
 * @property int $collectionType
 * @property float $amount
 * @property string $status
 * @property int $reservationprimeID
 * @property int $documentHeaderPrimeID
 * 
 * @property \App\Models\Documentheaderrequest $documentheaderrequest
 * @property \App\Models\Reservation $reservation
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
		'documentHeaderPrimeID' => 'int'
	];

	protected $fillable = [
		'collectionID',
		'collectionType',
		'amount',
		'status',
		'reservationprimeID',
		'documentHeaderPrimeID'
	];

	public function documentheaderrequest()
	{
		return $this->belongsTo(\App\Models\Documentheaderrequest::class, 'documentHeaderPrimeID');
	}

	public function reservation()
	{
		return $this->belongsTo(\App\Models\Reservation::class, 'reservationprimeID');
	}
}
