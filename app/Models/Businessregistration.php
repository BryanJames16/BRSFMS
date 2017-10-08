<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 09 Oct 2017 00:48:55 +0800.
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
 * @property int $categoryID
 * 
 * @property \App\Models\Businesscategory $businesscategory
 * @property \App\Models\Resident $resident
 * @property \Illuminate\Database\Eloquent\Collection $logs
 *
 * @package App\Models
 */
class Businessregistration extends Eloquent
{
	protected $primaryKey = 'registrationPrimeID';
	public $timestamps = false;

	protected $casts = [
		'residentPrimeID' => 'int',
		'archive' => 'int',
		'categoryID' => 'int'
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
		'gender',
		'categoryID'
	];

	public function businesscategory()
	{
		return $this->belongsTo(\App\Models\Businesscategory::class, 'categoryID');
	}

	public function resident()
	{
		return $this->belongsTo(\App\Models\Resident::class, 'residentPrimeID');
	}

	public function logs()
	{
		return $this->hasMany(\App\Models\Log::class, 'businessID');
	}
}
