<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 15 Oct 2017 18:14:50 +0800.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Business
 * 
 * @property int $businessPrimeID
 * @property string $businessID
 * @property string $businessName
 * @property string $businessDesc
 * @property string $businessType
 * @property int $categoryPrimeID
 * @property bool $status
 * @property bool $archive
 * 
 * @property \App\Models\Businesscategory $businesscategory
 *
 * @package App\Models
 */
class Business extends Eloquent
{
	protected $primaryKey = 'businessPrimeID';
	public $timestamps = false;

	protected $casts = [
		'categoryPrimeID' => 'int',
		'status' => 'bool',
		'archive' => 'bool'
	];

	protected $fillable = [
		'businessID',
		'businessName',
		'businessDesc',
		'businessType',
		'categoryPrimeID',
		'status',
		'archive'
	];

	public function businesscategory()
	{
		return $this->belongsTo(\App\Models\Businesscategory::class, 'categoryPrimeID');
	}
}
