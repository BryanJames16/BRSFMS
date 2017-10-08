<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 09 Oct 2017 00:48:55 +0800.
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

	public function lots()
	{
		return $this->hasMany(\App\Models\Lot::class, 'streetID');
	}
}
