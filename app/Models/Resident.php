<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Resident
 */
class Resident extends Model
{
    protected $table = 'residents';

    protected $primaryKey = 'peoplePrimeID';

	public $timestamps = false;

    protected $fillable = [
        'civilStatus',
        'seniorCitizenID',
        'disabilities',
        'residentType',
        'status'
    ];

    protected $guarded = [];

        
}