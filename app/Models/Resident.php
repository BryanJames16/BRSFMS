<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 16 Aug 2017 07:54:48 +0000.
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
 * 
 * @property \Illuminate\Database\Eloquent\Collection $documentheaderrequests
 * @property \Illuminate\Database\Eloquent\Collection $families
 * @property \Illuminate\Database\Eloquent\Collection $familymembers
 * @property \Illuminate\Database\Eloquent\Collection $generaladdresses
 * @property \Illuminate\Database\Eloquent\Collection $participants
 * @property \Illuminate\Database\Eloquent\Collection $residentaccounts
 * @property \Illuminate\Database\Eloquent\Collection $residentbackgrounds
 * @property \Illuminate\Database\Eloquent\Collection $residentregistrations
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
		'birthDate'
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
		'status'
	];

	public function documentheaderrequests()
	{
		return $this->hasMany(\App\Models\Documentheaderrequest::class, 'peoplePrimeID');
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

	public function participants()
	{
		return $this->hasMany(\App\Models\Participant::class, 'residentID');
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

	public function voters()
	{
		return $this->hasMany(\App\Models\Voter::class, 'peoplePrimeID');
	}
}
