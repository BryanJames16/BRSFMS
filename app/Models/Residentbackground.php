<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 09 Aug 2017 06:06:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Residentbackground
 * 
 * @property int $backgroundPrimeID
 * @property string $currentWork
 * @property string $monthlyIncome
 * @property \Carbon\Carbon $dateStarted
 * @property int $peoplePrimeID
 * @property bool $status
 * @property bool $archive
 * 
 * @property \App\Models\Resident $resident
 *
 * @package App\Models
 */
class Residentbackground extends Eloquent
{
	protected $primaryKey = 'backgroundPrimeID';
	public $timestamps = false;

	protected $casts = [
		'peoplePrimeID' => 'int',
		'status' => 'bool',
		'archive' => 'bool'
	];

	protected $dates = [
		'dateStarted'
	];

	protected $fillable = [
		'currentWork',
		'monthlyIncome',
		'dateStarted',
		'peoplePrimeID',
		'status',
		'archive'
	];

	public function resident()
	{
		return $this->belongsTo(\App\Models\Resident::class, 'peoplePrimeID');
	}
}
