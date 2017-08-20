<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 20 Aug 2017 13:11:54 +0000.
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
