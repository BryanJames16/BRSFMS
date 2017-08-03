<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 03 Aug 2017 10:35:25 +0000.
 */

namespace App\Models\Base;

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
 * @package App\Models\Base
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

	public function residentaccount()
	{
		return $this->belongsTo(\App\Models\Residentaccount::class, 'accountPrimeID');
	}
}
