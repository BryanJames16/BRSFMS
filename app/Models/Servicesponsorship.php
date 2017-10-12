<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 12 Oct 2017 23:36:12 +0800.
 */

namespace App\Models;

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
 * @package App\Models
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

	protected $fillable = [
		'sponsorshipDate',
		'servicePrimeID',
		'peoplePrimeID',
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
