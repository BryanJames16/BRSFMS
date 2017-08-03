<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 03 Aug 2017 10:35:25 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Employeeposition
 * 
 * @property int $positionID
 * @property string $positionName
 * @property \Carbon\Carbon $positionDate
 * @property int $positionLevel
 * @property bool $status
 * @property bool $archive
 * @property int $employeePrimeID
 * 
 * @property \App\Models\Employee $employee
 *
 * @package App\Models\Base
 */
class Employeeposition extends Eloquent
{
	protected $table = 'employeeposition';
	protected $primaryKey = 'positionID';
	public $timestamps = false;

	protected $casts = [
		'positionLevel' => 'int',
		'status' => 'bool',
		'archive' => 'bool',
		'employeePrimeID' => 'int'
	];

	protected $dates = [
		'positionDate'
	];

	public function employee()
	{
		return $this->belongsTo(\App\Models\Employee::class, 'employeePrimeID');
	}
}
