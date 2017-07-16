<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Residentaccountregistration
 */
class ResidentAccountRegistration extends Model
{
    protected $table = 'residentaccountregistrations';

    protected $primaryKey = 'registrationID';

	public $timestamps = false;

    protected $fillable = [
        'registrationDate',
        'accountPrimeID'
    ];

    protected $guarded = [];
}