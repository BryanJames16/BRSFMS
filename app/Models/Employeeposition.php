<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Employeeposition
 */
class Employeeposition extends Model
{
    protected $table = 'employeeposition';

    protected $primaryKey = 'positionID';

	public $timestamps = false;

    protected $fillable = [
        'positionName',
        'positionDate',
        'positionLevel',
        'status',
        'archive',
        'employeePrimeID'
    ];

    protected $guarded = [];

        
}