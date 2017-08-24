<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 23 Aug 2017 15:56:11 +0000.
 */

namespace App\Models;

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
 * @package App\Models
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

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'employeeID',
		'registrationID',
		'username',
		'password',
		'status',
		'archive'
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
