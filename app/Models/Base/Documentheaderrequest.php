<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 03 Aug 2017 10:35:25 +0000.
 */

namespace App\Models\Base;

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
 * @package App\Models\Base
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

	public function resident()
	{
		return $this->belongsTo(\App\Models\Resident::class, 'peoplePrimeID');
	}

	public function documentdetailrequests()
	{
		return $this->hasMany(\App\Models\Documentdetailrequest::class, 'headerPrimeID');
	}
}
