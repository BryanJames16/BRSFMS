<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 12 Oct 2017 23:36:11 +0800.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Barangaycard
 * 
 * @property int $cardID
 * @property int $rID
 * @property \Carbon\Carbon $expirationDate
 * @property \Carbon\Carbon $dateIssued
 * @property int $released
 * @property int $status
 * @property int $memID
 * 
 * @property \App\Models\Familymember $familymember
 * @property \App\Models\Resident $resident
 * @property \Illuminate\Database\Eloquent\Collection $collections
 *
 * @package App\Models
 */
class Barangaycard extends Eloquent
{
	protected $table = 'barangaycard';
	protected $primaryKey = 'cardID';
	public $timestamps = false;

	protected $casts = [
		'rID' => 'int',
		'released' => 'int',
		'status' => 'int',
		'memID' => 'int'
	];

	protected $dates = [
		'expirationDate',
		'dateIssued'
	];

	protected $fillable = [
		'rID',
		'expirationDate',
		'dateIssued',
		'released',
		'status',
		'memID'
	];

	public function familymember()
	{
		return $this->belongsTo(\App\Models\Familymember::class, 'memID');
	}

	public function resident()
	{
		return $this->belongsTo(\App\Models\Resident::class, 'rID');
	}

	public function collections()
	{
		return $this->hasMany(\App\Models\Collection::class, 'cardID');
	}
}
