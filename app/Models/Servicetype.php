<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 17 Aug 2017 15:09:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Servicetype
 * 
 * @property int $typeID
 * @property string $typeName
 * @property string $typeDesc
 * @property bool $status
 * @property bool $archive
 * 
 * @property \Illuminate\Database\Eloquent\Collection $services
 *
 * @package App\Models
 */
class Servicetype extends Eloquent
{
	protected $primaryKey = 'typeID';
	public $timestamps = false;

	protected $casts = [
		'status' => 'bool',
		'archive' => 'bool'
	];

	protected $fillable = [
		'typeName',
		'typeDesc',
		'status',
		'archive'
	];

	public function services()
	{
		return $this->hasMany(\App\Models\Service::class, 'typeID');
	}
}
