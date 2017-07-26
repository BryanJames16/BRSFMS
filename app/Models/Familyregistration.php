<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Familyregistration
 */
class Familyregistration extends Model
{
    protected $table = 'familyregistrations';

    protected $primaryKey = 'primeID';

	public $timestamps = false;

    protected $fillable = [
        'registrationID',
        'registrationDate',
        'familyPrimeID'
    ];

    protected $guarded = [];



}