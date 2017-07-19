<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Facility
 */
class Facility extends Model
{
    protected $table = 'facilities';

    protected $primaryKey = 'primeID';

	public $timestamps = false;

    protected $fillable = [
        'facilityID',
        'facilityName',
        'facilityDesc',
        'status',
        'archive',
        'facilityTypeID',
        'facilityDayPrice',
        'facilityNightPrice'
    ];

    protected $guarded = [];

}