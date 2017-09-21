<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 20 Sep 2017 17:12:10 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Documentrequest
 * 
 * @property int $documentRequestPrimeID
 * @property string $requestID
 * @property \Carbon\Carbon $requestDate
 * @property string $status
 * @property int $residentPrimeID
 * @property int $documentsPrimeID
 * @property int $quantity
 * @property string $remark
 * 
 * @property \App\Models\Document $document
 * @property \App\Models\Resident $resident
 * @property \Illuminate\Database\Eloquent\Collection $collections
 * @property \Illuminate\Database\Eloquent\Collection $requestrequirements
 *
 * @package App\Models
 */
class Documentrequest extends Eloquent
{
	protected $primaryKey = 'documentRequestPrimeID';
	public $timestamps = false;

	protected $casts = [
		'residentPrimeID' => 'int',
		'documentsPrimeID' => 'int',
		'quantity' => 'int'
	];

	protected $dates = [
		'requestDate'
	];

	protected $fillable = [
		'requestID',
		'requestDate',
		'status',
		'residentPrimeID',
		'documentsPrimeID',
		'quantity',
		'remark'
	];

	public function document()
	{
		return $this->belongsTo(\App\Models\Document::class, 'documentsPrimeID');
	}

	public function resident()
	{
		return $this->belongsTo(\App\Models\Resident::class, 'residentPrimeID');
	}

	public function collections()
	{
		return $this->hasMany(\App\Models\Collection::class, 'documentHeaderPrimeID');
	}

	public function requestrequirements()
	{
		return $this->hasMany(\App\Models\Requestrequirement::class, 'documentRequestPrimeID');
	}
}
