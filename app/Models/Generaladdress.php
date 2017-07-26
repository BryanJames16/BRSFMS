<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Generaladdress
 */
class Generaladdress extends Model
{
    protected $table = 'generaladdresses';

    protected $primaryKey = 'personAddressID';

	public $timestamps = false;

    protected $fillable = [
        'addressID',
        'addressType',
        'residentPrimeID',
        'facilitiesPrimeID',
        'businessPrimeID',
        'houseID',
        'unitID',
        'streetID'
    ];

    protected $guarded = [];

    {{getters}}

    {{setters}}


}