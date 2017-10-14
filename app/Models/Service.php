<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 14 Oct 2017 14:16:32 +0800.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Service
 * 
 * @property int $primeID
 * @property string $serviceID
 * @property string $serviceName
 * @property string $serviceDesc
 * @property int $typeID
 * @property bool $status
 * @property bool $archive
 * 
 * @property \App\Models\Servicetype $servicetype
 * @property \Illuminate\Database\Eloquent\Collection $servicesponsorships
 * @property \Illuminate\Database\Eloquent\Collection $servicetransactions
 *
 * @package App\Models
 */
class Service extends Eloquent
{
	protected $primaryKey = 'primeID';
	public $timestamps = false;

	protected $casts = [
		'typeID' => 'int',
		'status' => 'bool',
		'archive' => 'bool'
	];

	protected $fillable = [
		'serviceID',
		'serviceName',
		'serviceDesc',
		'typeID',
		'status',
		'archive'
	];

	public function servicetype()
	{
		return $this->belongsTo(\App\Models\Servicetype::class, 'typeID');
	}

	public function servicesponsorships()
	{
		return $this->hasMany(\App\Models\Servicesponsorship::class, 'servicePrimeID');
	}

	public function servicetransactions()
	{
		return $this->hasMany(\App\Models\Servicetransaction::class, 'servicePrimeID');
	}
}
