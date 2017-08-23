<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 23 Aug 2017 02:39:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Sysutil
 * 
 * @property int $sysUtilID
 * @property string $brgyName
 *
 * @package App\Models
 */
class Sysutil extends Eloquent
{
	protected $table = 'sysutil';
	protected $primaryKey = 'sysUtilID';
	public $timestamps = false;

	protected $fillable = [
		'brgyName'
	];
}
