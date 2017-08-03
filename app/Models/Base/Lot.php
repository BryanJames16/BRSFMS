<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 03 Aug 2017 10:35:25 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Lot
 * 
 * @property int $lotID
 * @property string $lotCode
 * @property int $streetID
 * @property bool $status
 * @property bool $archive
 * 
 * @property \App\Models\Street $street
 * @property \Illuminate\Database\Eloquent\Collection $buildings
 *
 * @package App\Models\Base
 */
class Lot extends Eloquent
{
	protected $primaryKey = 'lotID';
	public $timestamps = false;

	protected $casts = [
		'streetID' => 'int',
		'status' => 'bool',
		'archive' => 'bool'
	];

	public function street()
	{
		return $this->belongsTo(\App\Models\Street::class, 'streetID');
	}

	public function buildings()
	{
		return $this->hasMany(\App\Models\Building::class, 'lotID');
	}
}
