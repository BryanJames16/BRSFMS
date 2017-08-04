<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 03 Aug 2017 13:51:32 +0000.
 */

namespace App\Models;

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
 * @package App\Models
 */
class Facilitytype extends Eloquent
{
	protected $primaryKey = 'typeID';
	public $timestamps = false;

	protected $casts = [
		'status' => 'bool',
		'archive' => 'bool'
	];

	protected $fillable = [
		'typeName',
		'status',
		'archive'
	];

	public function facilities()
	{
		return $this->hasMany(\App\Models\Facility::class, 'facilityTypeID');
	}
}
