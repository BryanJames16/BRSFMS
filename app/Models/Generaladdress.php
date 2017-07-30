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
        'addressType',
        'residentPrimeID',
        'facilitiesPrimeID',
        'businessPrimeID',
        'unitID',
        'streetID',
        'lotID',
        'buildingID'
    ];

    protected $guarded = [];

    {{getters}}

    {{setters}}


}