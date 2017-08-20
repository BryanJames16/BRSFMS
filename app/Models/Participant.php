<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 20 Aug 2017 15:08:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Participant
 * 
 * @property int $participantID
 * @property int $serviceTransactionPrimeID
 * @property int $residentID
 * @property \Carbon\Carbon $dateRegistered
 * 
 * @property \App\Models\Resident $resident
 * @property \App\Models\Servicetransaction $servicetransaction
 *
 * @package App\Models
 */
class Participant extends Eloquent
{
	protected $primaryKey = 'participantID';
	public $timestamps = false;

	protected $casts = [
		'serviceTransactionPrimeID' => 'int',
		'residentID' => 'int'
	];

	protected $dates = [
		'dateRegistered'
	];

	protected $fillable = [
		'serviceTransactionPrimeID',
		'residentID',
		'dateRegistered'
	];

	public function resident()
	{
		return $this->belongsTo(\App\Models\Resident::class, 'residentID');
	}

	public function servicetransaction()
	{
		return $this->belongsTo(\App\Models\Servicetransaction::class, 'serviceTransactionPrimeID');
	}
}
