<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 20 Sep 2017 17:12:10 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Businessregistration
 * 
 * @property int $registrationPrimeID
 * @property string $businessID
 * @property string $originalName
 * @property string $tradeName
 * @property int $residentPrimeID
 * @property \Carbon\Carbon $registrationDate
 * @property \Carbon\Carbon $removalDate
 * @property int $archive
 * @property string $address
 * @property string $firstName
 * @property string $middleName
 * @property string $lastName
 * @property string $contactNumber
 * @property \Carbon\Carbon $birthday
 * @property string $gender
 * 
 * @property \App\Models\Resident $resident
 * @property \Illuminate\Database\Eloquent\Collection $generaladdresses
 *
 * @package App\Models
 */
class Businessregistration extends Eloquent
{
	protected $primaryKey = 'registrationPrimeID';
	public $timestamps = false;

	protected $casts = [
		'residentPrimeID' => 'int',
		'archive' => 'int'
	];

	protected $dates = [
		'registrationDate',
		'removalDate',
		'birthday'
	];

	protected $fillable = [
		'businessID',
		'originalName',
		'tradeName',
		'residentPrimeID',
		'registrationDate',
		'removalDate',
		'archive',
		'address',
		'firstName',
		'middleName',
		'lastName',
		'contactNumber',
		'birthday',
		'gender'
	];

	public function resident()
	{
		return $this->belongsTo(\App\Models\Resident::class, 'residentPrimeID');
	}

	public function generaladdresses()
	{
		return $this->hasMany(\App\Models\Generaladdress::class, 'businessPrimeID');
	}
}
