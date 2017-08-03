<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 03 Aug 2017 10:35:25 +0000.
 */

namespace App\Models\Base;

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
 * @package App\Models\Base
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

	public function business()
	{
		return $this->belongsTo(\App\Models\Business::class, 'businessPrimeID');
	}

	public function person()
	{
		return $this->belongsTo(\App\Models\Person::class, 'peoplePrimeID');
	}
}
