<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 03 Aug 2017 10:35:25 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Facilitytype
 * 
 * @property int $typeID
 * @property string $typeName
 * @property bool $status
 * @property bool $archive
 * 
 * @property \Illuminate\Database\Eloquent\Collection $facilities
 *
 * @package App\Models\Base
 */
class Facilitytype extends Eloquent
{
	protected $primaryKey = 'typeID';
	public $timestamps = false;

	protected $casts = [
		'status' => 'bool',
		'archive' => 'bool'
	];

	public function facilities()
	{
		return $this->hasMany(\App\Models\Facility::class, 'facilityTypeID');
	}
}
