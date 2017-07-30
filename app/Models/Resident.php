<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Resident
 */
class Resident extends Model
{
    protected $table = 'residents';

    protected $primaryKey = 'residentPrimeID';

	public $timestamps = false;

    protected $fillable = [
        'residentID',
        'firstName',
        'middleName',
        'lastName',
        'suffix',
        'contactNumber',
        'gender',
        'birthDate',
        'civilStatus',
        'seniorCitizenID',
        'disabilities',
        'residentType',
        'status'
    ];

    protected $guarded = [];

    {{getters}}

    {{setters}}


}