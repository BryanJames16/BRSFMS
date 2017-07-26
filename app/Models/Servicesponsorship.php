<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Servicesponsorship
 */
class Servicesponsorship extends Model
{
    protected $table = 'servicesponsorships';

    protected $primaryKey = 'sponsorPrimeID';

	public $timestamps = false;

    protected $fillable = [
        'sponsorshipDate',
        'servicePrimeID',
        'peoplePrimeID',
        'startOfImplementation',
        'endOfImplementation'
    ];

    protected $guarded = [];


}