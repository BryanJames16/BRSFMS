<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 25 Aug 2017 15:47:18 +0000.
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
 * @property int $peoplePrimeID
 * @property int $residentPrimeID
 * @property \Carbon\Carbon $registrationDate
 * @property \Carbon\Carbon $removalDate
 * @property int $archive
 * 
 * @property \App\Models\Person $person
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
		'peoplePrimeID' => 'int',
		'residentPrimeID' => 'int',
		'archive' => 'int'
	];

	protected $dates = [
		'registrationDate',
		'removalDate'
	];

	protected $fillable = [
		'businessID',
		'originalName',
		'tradeName',
		'peoplePrimeID',
		'residentPrimeID',
		'registrationDate',
		'removalDate',
		'archive'
	];

	public function person()
	{
		return $this->belongsTo(\App\Models\Person::class, 'peoplePrimeID');
	}

	public function resident()
	{
		return $this->belongsTo(\App\Models\Resident::class, 'residentPrimeID');
	}

	public function generaladdresses()
	{
		return $this->hasMany(\App\Models\Generaladdress::class, 'businessPrimeID');
	}
}
