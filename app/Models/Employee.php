<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 */
class Employee extends Model
{
    protected $table = 'employees';

    protected $primaryKey = 'primeID';

	public $timestamps = false;

    protected $fillable = [
        'employeeID',
        'registrationID',
        'username',
        'password',
        'status',
        'archive'
    ];

    protected $guarded = [];
}