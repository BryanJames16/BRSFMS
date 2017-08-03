<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 03 Aug 2017 10:35:25 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Employee
 * 
 * @property int $primeID
 * @property string $employeeID
 * @property int $registrationID
 * @property string $username
 * @property string $password
 * @property bool $status
 * @property bool $archive
 * 
 * @property \Illuminate\Database\Eloquent\Collection $employeepositions
 * @property \Illuminate\Database\Eloquent\Collection $residentregistrations
 *
 * @package App\Models\Base
 */
class Employee extends Eloquent
{
	protected $primaryKey = 'primeID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'primeID' => 'int',
		'registrationID' => 'int',
		'status' => 'bool',
		'archive' => 'bool'
	];

	public function employeepositions()
	{
		return $this->hasMany(\App\Models\Employeeposition::class, 'employeePrimeID');
	}

	public function residentregistrations()
	{
		return $this->hasMany(\App\Models\Residentregistration::class, 'employeePrimeID');
	}
}
