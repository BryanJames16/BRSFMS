<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 23 Aug 2017 15:56:11 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Recipient
 * 
 * @property int $recipientID
 * @property string $recipientName
 * @property int $status
 * @property int $archive
 *
 * @package App\Models
 */
class Recipient extends Eloquent
{
	protected $primaryKey = 'recipientID';
	public $timestamps = false;

	protected $casts = [
		'status' => 'int',
		'archive' => 'int'
	];

	protected $fillable = [
		'recipientName',
		'status',
		'archive'
	];
}
