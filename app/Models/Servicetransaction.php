<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 16 Oct 2017 10:06:22 +0800.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Servicetransaction
 * 
 * @property int $serviceTransactionPrimeID
 * @property string $serviceTransactionID
 * @property string $serviceName
 * @property int $servicePrimeID
 * @property int $fromAge
 * @property int $toAge
 * @property \Carbon\Carbon $fromDate
 * @property \Carbon\Carbon $toDate
 * @property string $status
 * @property int $archive
 * 
 * @property \App\Models\Service $service
 * @property \Illuminate\Database\Eloquent\Collection $logs
 * @property \Illuminate\Database\Eloquent\Collection $participants
 * @property \Illuminate\Database\Eloquent\Collection $sponsors
 *
 * @package App\Models
 */
class Servicetransaction extends Eloquent
{
	protected $primaryKey = 'serviceTransactionPrimeID';
	public $timestamps = false;

	protected $casts = [
		'servicePrimeID' => 'int',
		'fromAge' => 'int',
		'toAge' => 'int',
		'archive' => 'int'
	];

	protected $dates = [
		'fromDate',
		'toDate'
	];

	protected $fillable = [
		'serviceTransactionID',
		'serviceName',
		'servicePrimeID',
		'fromAge',
		'toAge',
		'fromDate',
		'toDate',
		'status',
		'archive'
	];

	public function service()
	{
		return $this->belongsTo(\App\Models\Service::class, 'servicePrimeID');
	}

	public function logs()
	{
		return $this->hasMany(\App\Models\Log::class, 'servTransactionPrimeID');
	}

	public function participants()
	{
		return $this->hasMany(\App\Models\Participant::class, 'serviceTransactionPrimeID');
	}

	public function sponsors()
	{
		return $this->hasMany(\App\Models\Sponsor::class, 'sID');
	}
}
