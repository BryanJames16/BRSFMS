<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 09 Aug 2017 05:04:48 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Servicetransaction
 * 
 * @property int $serviceTransactionID
 * @property string $serviceName
 * @property int $fromAge
 * @property int $toAge
 * @property \Carbon\Carbon $fromDate
 * @property \Carbon\Carbon $toDate
 * 
 * @property \Illuminate\Database\Eloquent\Collection $participants
 *
 * @package App\Models
 */
class Servicetransaction extends Eloquent
{
	protected $primaryKey = 'serviceTransactionID';
	public $timestamps = false;

	protected $casts = [
		'fromAge' => 'int',
		'toAge' => 'int'
	];

	protected $dates = [
		'fromDate',
		'toDate'
	];

	protected $fillable = [
		'serviceName',
		'fromAge',
		'toAge',
		'fromDate',
		'toDate'
	];

	public function participants()
	{
		return $this->hasMany(\App\Models\Participant::class, 'serviceTransactionID');
	}
}
