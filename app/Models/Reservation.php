<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Reservation
 */
class Reservation extends Model
{
    protected $table = 'reservations';

    protected $primaryKey = 'primeID';

	public $timestamps = false;

    protected $fillable = [
        'reservationsStart',
        'reservationEnd',
        'dateReserved',
        'status',
        'peoplePrimeID',
        'facilityPrimeID'
    ];

    protected $guarded = [];

        
}