<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 20 Sep 2017 05:01:39 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Street
 * 
 * @property int $streetID
 * @property string $streetName
 * @property bool $status
 * @property bool $archive
 * 
 * @property \Illuminate\Database\Eloquent\Collection $generaladdresses
 * @property \Illuminate\Database\Eloquent\Collection $lots
 *
 * @package App\Models
 */
class Street extends Eloquent
{
	protected $primaryKey = 'streetID';
	public $timestamps = false;

	protected $casts = [
		'status' => 'bool',
		'archive' => 'bool'
	];

	protected $fillable = [
		'streetName',
		'status',
		'archive'
	];

	public function generaladdresses()
	{
		return $this->hasMany(\App\Models\Generaladdress::class, 'streetID');
	}

	public function lots()
	{
		return $this->hasMany(\App\Models\Lot::class, 'streetID');
	}
}
