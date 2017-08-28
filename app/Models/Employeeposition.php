<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 28 Aug 2017 07:02:12 +0000.
 */

namespace App\Models;

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
 * @package App\Models
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

	protected $fillable = [
		'positionName',
		'positionDate',
		'positionLevel',
		'status',
		'archive',
		'employeePrimeID'
	];

	public function employee()
	{
		return $this->belongsTo(\App\Models\Employee::class, 'employeePrimeID');
	}
}
