<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 12 Oct 2017 18:00:10 +0800.
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
