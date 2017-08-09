<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 09 Aug 2017 06:06:43 +0000.
 */

namespace App\Models;

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
 * @package App\Models
 */
class Person extends Eloquent
{
	protected $primaryKey = 'peoplePrimeID';
	public $timestamps = false;

	protected $casts = [
		'status' => 'bool',
		'archive' => 'bool'
	];

	protected $fillable = [
		'personID',
		'firstName',
		'middleName',
		'lastName',
		'suffix',
		'contactNumber',
		'gender',
		'status',
		'archive'
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
