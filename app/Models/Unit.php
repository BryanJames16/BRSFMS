<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 08 Oct 2017 10:41:00 +0800.
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
}
