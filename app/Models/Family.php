<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 15 Oct 2017 18:14:51 +0800.
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
 * @property \Illuminate\Database\Eloquent\Collection $logs
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

	public function logs()
	{
		return $this->hasMany(\App\Models\Log::class, 'famID');
	}
}
