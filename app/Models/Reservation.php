<?php

namespace App\Models;

class Reservation extends \App\Models\Base\Reservation
{
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
}
