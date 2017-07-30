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
        'reservationName',
        'reservationDescription',
        'reservationStart',
        'reservationEnd',
        'dateReserved',
        'peoplePrimeID',
        'facilityPrimeID',
        'status'
    ];

    protected $guarded = [];


}