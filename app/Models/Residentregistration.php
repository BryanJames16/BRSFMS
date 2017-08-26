<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 25 Aug 2017 15:47:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Residentregistration
 * 
 * @property int $registrationID
 * @property \Carbon\Carbon $registrationDate
 * @property int $employeePrimeID
 * @property int $peoplePrimeID
 * 
 * @property \App\Models\Employee $employee
 * @property \App\Models\Resident $resident
 *
 * @package App\Models
 */
class Residentregistration extends Eloquent
{
	protected $primaryKey = 'registrationID';
	public $timestamps = false;

	protected $casts = [
		'employeePrimeID' => 'int',
		'peoplePrimeID' => 'int'
	];

	protected $dates = [
		'registrationDate'
	];

	protected $fillable = [
		'registrationDate',
		'employeePrimeID',
		'peoplePrimeID'
	];

	public function employee()
	{
		return $this->belongsTo(\App\Models\Employee::class, 'employeePrimeID');
	}

	public function resident()
	{
		return $this->belongsTo(\App\Models\Resident::class, 'peoplePrimeID');
	}
}
