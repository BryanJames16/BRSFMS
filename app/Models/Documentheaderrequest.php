<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 09 Aug 2017 05:04:48 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Documentheaderrequest
 * 
 * @property int $documentHeaderPrimeID
 * @property string $requestID
 * @property \Carbon\Carbon $requestDate
 * @property string $status
 * @property int $peoplePrimeID
 * 
 * @property \App\Models\Resident $resident
 * @property \Illuminate\Database\Eloquent\Collection $documentdetailrequests
 *
 * @package App\Models
 */
class Documentheaderrequest extends Eloquent
{
	protected $primaryKey = 'documentHeaderPrimeID';
	public $timestamps = false;

	protected $casts = [
		'peoplePrimeID' => 'int'
	];

	protected $dates = [
		'requestDate'
	];

	protected $fillable = [
		'requestID',
		'requestDate',
		'status',
		'peoplePrimeID'
	];

	public function resident()
	{
		return $this->belongsTo(\App\Models\Resident::class, 'peoplePrimeID');
	}

	public function documentdetailrequests()
	{
		return $this->hasMany(\App\Models\Documentdetailrequest::class, 'headerPrimeID');
	}
}
