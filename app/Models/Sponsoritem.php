<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 16 Oct 2017 10:06:22 +0800.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Sponsoritem
 * 
 * @property int $id
 * @property int $sponsorID
 * @property string $itemName
 * @property int $quantity
 * 
 * @property \App\Models\Sponsor $sponsor
 *
 * @package App\Models
 */
class Sponsoritem extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'sponsorID' => 'int',
		'quantity' => 'int'
	];

	protected $fillable = [
		'sponsorID',
		'itemName',
		'quantity'
	];

	public function sponsor()
	{
		return $this->belongsTo(\App\Models\Sponsor::class, 'sponsorID');
	}
}
