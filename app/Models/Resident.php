<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 15 Oct 2017 18:14:52 +0800.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Resident
 * 
 * @property int $residentPrimeID
 * @property string $residentID
 * @property string $firstName
 * @property string $middleName
 * @property string $lastName
 * @property string $suffix
 * @property string $contactNumber
 * @property string $gender
 * @property \Carbon\Carbon $birthDate
 * @property string $civilStatus
 * @property string $seniorCitizenID
 * @property string $disabilities
 * @property string $residentType
 * @property bool $status
 * @property string $imagePath
 * @property string $address
 * @property string $email
 * @property \Carbon\Carbon $dateReg
 * 
 * @property \Illuminate\Database\Eloquent\Collection $barangaycards
 * @property \Illuminate\Database\Eloquent\Collection $businessregistrations
 * @property \Illuminate\Database\Eloquent\Collection $collections
 * @property \Illuminate\Database\Eloquent\Collection $documentrequests
 * @property \Illuminate\Database\Eloquent\Collection $families
 * @property \Illuminate\Database\Eloquent\Collection $familymembers
 * @property \Illuminate\Database\Eloquent\Collection $generaladdresses
 * @property \Illuminate\Database\Eloquent\Collection $logs
 * @property \Illuminate\Database\Eloquent\Collection $participants
 * @property \Illuminate\Database\Eloquent\Collection $reservations
 * @property \Illuminate\Database\Eloquent\Collection $residentaccounts
 * @property \Illuminate\Database\Eloquent\Collection $residentbackgrounds
 * @property \Illuminate\Database\Eloquent\Collection $residentregistrations
 * @property \Illuminate\Database\Eloquent\Collection $sponsors
 * @property \Illuminate\Database\Eloquent\Collection $voters
 *
 * @package App\Models
 */
class Resident extends Eloquent
{
	protected $primaryKey = 'residentPrimeID';
	public $timestamps = false;

	protected $casts = [
		'status' => 'bool'
	];

	protected $dates = [
		'birthDate',
		'dateReg'
	];

	protected $fillable = [
		'residentID',
		'firstName',
		'middleName',
		'lastName',
		'suffix',
		'contactNumber',
		'gender',
		'birthDate',
		'civilStatus',
		'seniorCitizenID',
		'disabilities',
		'residentType',
		'status',
		'imagePath',
		'address',
		'email',
		'dateReg'
	];

	public function barangaycards()
	{
		return $this->hasMany(\App\Models\Barangaycard::class, 'rID');
	}

	public function businessregistrations()
	{
		return $this->hasMany(\App\Models\Businessregistration::class, 'residentPrimeID');
	}

	public function collections()
	{
		return $this->hasMany(\App\Models\Collection::class, 'residentPrimeID');
	}

	public function documentrequests()
	{
		return $this->hasMany(\App\Models\Documentrequest::class, 'residentPrimeID');
	}

	public function families()
	{
		return $this->hasMany(\App\Models\Family::class, 'familyHeadID');
	}

	public function familymembers()
	{
		return $this->hasMany(\App\Models\Familymember::class, 'peoplePrimeID');
	}

	public function generaladdresses()
	{
		return $this->hasMany(\App\Models\Generaladdress::class, 'residentPrimeID');
	}

	public function logs()
	{
		return $this->hasMany(\App\Models\Log::class, 'resID');
	}

	public function participants()
	{
		return $this->hasMany(\App\Models\Participant::class, 'residentID');
	}

	public function reservations()
	{
		return $this->hasMany(\App\Models\Reservation::class, 'peoplePrimeID');
	}

	public function residentaccounts()
	{
		return $this->hasMany(\App\Models\Residentaccount::class, 'peoplePrimeID');
	}

	public function residentbackgrounds()
	{
		return $this->hasMany(\App\Models\Residentbackground::class, 'peoplePrimeID');
	}

	public function residentregistrations()
	{
		return $this->hasMany(\App\Models\Residentregistration::class, 'peoplePrimeID');
	}

	public function sponsors()
	{
		return $this->hasMany(\App\Models\Sponsor::class, 'resiID');
	}

	public function voters()
	{
		return $this->hasMany(\App\Models\Voter::class, 'peoplePrimeID');
	}
}
