<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 03 Aug 2017 10:35:25 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Residentaccount
 * 
 * @property int $accountPrimeID
 * @property string $accountID
 * @property string $username
 * @property string $password
 * @property string $accessCode
 * @property bool $status
 * @property bool $archive
 * @property int $peoplePrimeID
 * 
 * @property \App\Models\Resident $resident
 * @property \Illuminate\Database\Eloquent\Collection $residentaccountregistrations
 *
 * @package App\Models\Base
 */
class Residentaccount extends Eloquent
{
	protected $primaryKey = 'accountPrimeID';
	public $timestamps = false;

	protected $casts = [
		'status' => 'bool',
		'archive' => 'bool',
		'peoplePrimeID' => 'int'
	];

	public function resident()
	{
		return $this->belongsTo(\App\Models\Resident::class, 'peoplePrimeID');
	}

	public function residentaccountregistrations()
	{
		return $this->hasMany(\App\Models\Residentaccountregistration::class, 'accountPrimeID');
	}
}
