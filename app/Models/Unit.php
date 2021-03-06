<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 15 Oct 2017 18:14:52 +0800.
 */

namespace App\Models;

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
 * @package App\Models
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

	protected $fillable = [
		'unitCode',
		'status',
		'archive',
		'buildingID'
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
