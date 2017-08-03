<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 03 Aug 2017 10:35:25 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Documentdetailrequest
 * 
 * @property int $documentDetailPrimeID
 * @property int $headerPrimeID
 * @property int $documentPrimeID
 * @property int $quantity
 * 
 * @property \App\Models\Documentheaderrequest $documentheaderrequest
 * @property \App\Models\Document $document
 *
 * @package App\Models\Base
 */
class Documentdetailrequest extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'headerPrimeID' => 'int',
		'documentPrimeID' => 'int',
		'quantity' => 'int'
	];

	public function documentheaderrequest()
	{
		return $this->belongsTo(\App\Models\Documentheaderrequest::class, 'headerPrimeID');
	}

	public function document()
	{
		return $this->belongsTo(\App\Models\Document::class, 'documentPrimeID');
	}
}
