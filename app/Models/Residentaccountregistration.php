<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 27 Aug 2017 06:44:06 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Residentaccountregistration
 * 
 * @property int $registrationID
 * @property \Carbon\Carbon $registrationDate
 * @property int $accountPrimeID
 * 
 * @property \App\Models\Residentaccount $residentaccount
 *
 * @package App\Models
 */
class Residentaccountregistration extends Eloquent
{
	protected $primaryKey = 'registrationID';
	public $timestamps = false;

	protected $casts = [
		'accountPrimeID' => 'int'
	];

	protected $dates = [
		'registrationDate'
	];

	protected $fillable = [
		'registrationDate',
		'accountPrimeID'
	];

	public function residentaccount()
	{
		return $this->belongsTo(\App\Models\Residentaccount::class, 'accountPrimeID');
	}
}
