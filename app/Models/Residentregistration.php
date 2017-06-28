<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Residentregistration
 */
class Residentregistration extends Model
{
    protected $table = 'residentregistrations';

    protected $primaryKey = 'registrationID';

	public $timestamps = false;

    protected $fillable = [
        'registrationDate',
        'employeePrimeID',
        'peoplePrimeID'
    ];

    protected $guarded = [];

        
}