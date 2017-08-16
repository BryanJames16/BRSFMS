<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 16 Aug 2017 13:19:52 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Businessregistration
 * 
 * @property int $registrationPrimeID
 * @property string $originalName
 * @property string $tradeName
 * @property int $peoplePrimeID
 * @property \Carbon\Carbon $registrationDate
 * @property \Carbon\Carbon $removalDate
 * @property int $archive
 * 
 * @property \App\Models\Person $person
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
		'archive' => 'int'
	];

	protected $dates = [
		'registrationDate',
		'removalDate'
	];

	protected $fillable = [
		'originalName',
		'tradeName',
		'peoplePrimeID',
		'registrationDate',
		'removalDate',
		'archive'
	];

	public function person()
	{
		return $this->belongsTo(\App\Models\Person::class, 'peoplePrimeID');
	}

	public function generaladdresses()
	{
		return $this->hasMany(\App\Models\Generaladdress::class, 'businessPrimeID');
	}
}
