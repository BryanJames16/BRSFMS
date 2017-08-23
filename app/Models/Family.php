<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 23 Aug 2017 02:39:44 +0000.
 */

namespace App\Models;

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
 * @package App\Models
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

	protected $fillable = [
		'familyID',
		'familyHeadID',
		'familyName',
		'familyRegistrationDate',
		'archive'
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
