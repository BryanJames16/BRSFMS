<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 03 Aug 2017 10:35:25 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Servicesponsorship
 * 
 * @property int $sponsorPrimeID
 * @property \Carbon\Carbon $sponsorshipDate
 * @property int $servicePrimeID
 * @property int $peoplePrimeID
 * @property \Carbon\Carbon $startOfImplementation
 * @property \Carbon\Carbon $endOfImplementation
 * 
 * @property \App\Models\Person $person
 * @property \App\Models\Service $service
 *
 * @package App\Models\Base
 */
class Servicesponsorship extends Eloquent
{
	protected $primaryKey = 'sponsorPrimeID';
	public $timestamps = false;

	protected $casts = [
		'servicePrimeID' => 'int',
		'peoplePrimeID' => 'int'
	];

	protected $dates = [
		'sponsorshipDate',
		'startOfImplementation',
		'endOfImplementation'
	];

	public function person()
	{
		return $this->belongsTo(\App\Models\Person::class, 'peoplePrimeID');
	}

	public function service()
	{
		return $this->belongsTo(\App\Models\Service::class, 'servicePrimeID');
	}
}
