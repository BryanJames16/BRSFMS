<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 08 Oct 2017 10:40:59 +0800.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Barangaycard
 * 
 * @property int $cardID
 * @property int $rID
 * @property \Carbon\Carbon $expirationDate
 * @property \Carbon\Carbon $dateIssued
 * 
 * @property \App\Models\Resident $resident
 * @property \Illuminate\Database\Eloquent\Collection $collections
 *
 * @package App\Models
 */
class Barangaycard extends Eloquent
{
	protected $table = 'barangaycard';
	protected $primaryKey = 'cardID';
	public $timestamps = false;

	protected $casts = [
		'rID' => 'int'
	];

	protected $dates = [
		'expirationDate',
		'dateIssued'
	];

	protected $fillable = [
		'rID',
		'expirationDate',
		'dateIssued'
	];

	public function resident()
	{
		return $this->belongsTo(\App\Models\Resident::class, 'rID');
	}

	public function collections()
	{
		return $this->hasMany(\App\Models\Collection::class, 'cardID');
	}
}
