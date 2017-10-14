<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 14 Oct 2017 14:16:32 +0800.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Itemreservation
 * 
 * @property int $primeID
 * @property string $reservationName
 * @property string $reservationDescription
 * @property \Carbon\Carbon $reservationStart
 * @property \Carbon\Carbon $reservationEnd
 * @property \Carbon\Carbon $dateReserved
 * @property int $peoplePrimeID
 * @property int $itemID
 * @property int $itemQuantity
 * @property string $status
 * @property string $name
 * @property int $age
 * @property string $email
 * @property string $contactNumber
 *
 * @package App\Models
 */
class Itemreservation extends Eloquent
{
	protected $primaryKey = 'primeID';
	public $timestamps = false;

	protected $casts = [
		'peoplePrimeID' => 'int',
		'itemID' => 'int',
		'itemQuantity' => 'int',
		'age' => 'int'
	];

	protected $dates = [
		'reservationStart',
		'reservationEnd',
		'dateReserved'
	];

	protected $fillable = [
		'reservationName',
		'reservationDescription',
		'reservationStart',
		'reservationEnd',
		'dateReserved',
		'peoplePrimeID',
		'itemID',
		'itemQuantity',
		'status',
		'name',
		'age',
		'email',
		'contactNumber'
	];
}
