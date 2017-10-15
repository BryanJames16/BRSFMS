<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 16 Oct 2017 10:06:22 +0800.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Sponsor
 * 
 * @property int $sponsorID
 * @property int $resiID
 * @property int $sID
 * @property \Carbon\Carbon $dateSponsored
 * @property string $firstName
 * @property string $middleName
 * @property string $lastName
 * @property string $email
 * @property string $contactNumber
 * 
 * @property \App\Models\Resident $resident
 * @property \App\Models\Servicetransaction $servicetransaction
 * @property \Illuminate\Database\Eloquent\Collection $sponsoritems
 *
 * @package App\Models
 */
class Sponsor extends Eloquent
{
	protected $primaryKey = 'sponsorID';
	public $timestamps = false;

	protected $casts = [
		'resiID' => 'int',
		'sID' => 'int'
	];

	protected $dates = [
		'dateSponsored'
	];

	protected $fillable = [
		'resiID',
		'sID',
		'dateSponsored',
		'firstName',
		'middleName',
		'lastName',
		'email',
		'contactNumber'
	];

	public function resident()
	{
		return $this->belongsTo(\App\Models\Resident::class, 'resiID');
	}

	public function servicetransaction()
	{
		return $this->belongsTo(\App\Models\Servicetransaction::class, 'sID');
	}

	public function sponsoritems()
	{
		return $this->hasMany(\App\Models\Sponsoritem::class, 'sponsorID');
	}
}
