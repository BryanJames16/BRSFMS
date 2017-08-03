<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 03 Aug 2017 10:35:25 +0000.
 */

namespace App\Models\Base;

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
 *
 * @package App\Models\Base
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

	public function servicetype()
	{
		return $this->belongsTo(\App\Models\Servicetype::class, 'typeID');
	}

	public function servicesponsorships()
	{
		return $this->hasMany(\App\Models\Servicesponsorship::class, 'servicePrimeID');
	}
}
