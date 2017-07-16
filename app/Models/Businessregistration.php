<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Businessregistration
 */
class BusinessRegistration extends Model
{
    protected $table = 'businessregistrations';

    protected $primaryKey = 'registrationPrimeID';

	public $timestamps = false;

    protected $fillable = [
        'registrationID',
        'registrationDate',
        'businessPrimeID',
        'peoplePrimeID'
    ];

    protected $guarded = [];
}