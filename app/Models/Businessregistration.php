<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 13 Aug 2017 04:58:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Businessregistration
 * 
 * @property int $registrationPrimeID
 * @property string $registrationID
 * @property \Carbon\Carbon $registrationDate
 * @property int $businessPrimeID
 * @property int $peoplePrimeID
 * 
 * @property \App\Models\Business $business
 * @property \App\Models\Person $person
 *
 * @package App\Models
 */
class Businessregistration extends Eloquent
{
	protected $primaryKey = 'registrationPrimeID';
	public $timestamps = false;

	protected $casts = [
		'businessPrimeID' => 'int',
		'peoplePrimeID' => 'int'
	];

	protected $dates = [
		'registrationDate'
	];

	protected $fillable = [
		'registrationID',
		'registrationDate',
		'businessPrimeID',
		'peoplePrimeID'
	];

	public function business()
	{
		return $this->belongsTo(\App\Models\Business::class, 'businessPrimeID');
	}

	public function person()
	{
		return $this->belongsTo(\App\Models\Person::class, 'peoplePrimeID');
	}
}
