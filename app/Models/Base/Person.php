<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 03 Aug 2017 10:35:25 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Person
 * 
 * @property int $peoplePrimeID
 * @property string $personID
 * @property string $firstName
 * @property string $middleName
 * @property string $lastName
 * @property string $suffix
 * @property string $contactNumber
 * @property string $gender
 * @property bool $status
 * @property bool $archive
 * 
 * @property \Illuminate\Database\Eloquent\Collection $businessregistrations
 * @property \Illuminate\Database\Eloquent\Collection $reservations
 * @property \Illuminate\Database\Eloquent\Collection $servicesponsorships
 *
 * @package App\Models\Base
 */
class Person extends Eloquent
{
	protected $primaryKey = 'peoplePrimeID';
	public $timestamps = false;

	protected $casts = [
		'status' => 'bool',
		'archive' => 'bool'
	];

	public function businessregistrations()
	{
		return $this->hasMany(\App\Models\Businessregistration::class, 'peoplePrimeID');
	}

	public function reservations()
	{
		return $this->hasMany(\App\Models\Reservation::class, 'peoplePrimeID');
	}

	public function servicesponsorships()
	{
		return $this->hasMany(\App\Models\Servicesponsorship::class, 'peoplePrimeID');
	}
}
