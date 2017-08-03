<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 03 Aug 2017 10:35:25 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Unit
 * 
 * @property int $unitID
 * @property string $unitCode
 * @property bool $status
 * @property bool $archive
 * @property int $buildingID
 * 
 * @property \App\Models\Building $building
 * @property \Illuminate\Database\Eloquent\Collection $generaladdresses
 *
 * @package App\Models\Base
 */
class Unit extends Eloquent
{
	protected $primaryKey = 'unitID';
	public $timestamps = false;

	protected $casts = [
		'status' => 'bool',
		'archive' => 'bool',
		'buildingID' => 'int'
	];

	public function building()
	{
		return $this->belongsTo(\App\Models\Building::class, 'buildingID');
	}

	public function generaladdresses()
	{
		return $this->hasMany(\App\Models\Generaladdress::class, 'unitID');
	}
}
