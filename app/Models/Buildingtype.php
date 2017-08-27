<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 27 Aug 2017 06:44:05 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Buildingtype
 * 
 * @property int $buildingTypeID
 * @property string $buildingTypeName
 * @property int $status
 * @property int $archive
 * 
 * @property \Illuminate\Database\Eloquent\Collection $buildings
 *
 * @package App\Models
 */
class Buildingtype extends Eloquent
{
	protected $primaryKey = 'buildingTypeID';
	public $timestamps = false;

	protected $casts = [
		'status' => 'int',
		'archive' => 'int'
	];

	protected $fillable = [
		'buildingTypeName',
		'status',
		'archive'
	];

	public function buildings()
	{
		return $this->hasMany(\App\Models\Building::class, 'buildingTypeID');
	}
}
