<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 03 Aug 2017 10:35:25 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Family
 * 
 * @property int $familyPrimeID
 * @property string $familyID
 * @property int $familyHeadID
 * @property string $familyName
 * @property \Carbon\Carbon $familyRegistrationDate
 * @property bool $archive
 * 
 * @property \App\Models\Resident $resident
 * @property \Illuminate\Database\Eloquent\Collection $familymembers
 *
 * @package App\Models\Base
 */
class Family extends Eloquent
{
	protected $primaryKey = 'familyPrimeID';
	public $timestamps = false;

	protected $casts = [
		'familyHeadID' => 'int',
		'archive' => 'bool'
	];

	protected $dates = [
		'familyRegistrationDate'
	];

	public function resident()
	{
		return $this->belongsTo(\App\Models\Resident::class, 'familyHeadID');
	}

	public function familymembers()
	{
		return $this->hasMany(\App\Models\Familymember::class, 'familyPrimeID');
	}
}
