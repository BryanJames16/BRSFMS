<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 20 Aug 2017 12:47:19 +0000.
 */

namespace App\Models;

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
 * @package App\Models
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

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'accountID',
		'username',
		'password',
		'accessCode',
		'status',
		'archive',
		'peoplePrimeID'
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
