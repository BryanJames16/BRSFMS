<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 26 Sep 2017 21:32:51 +0800.
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
 * @property \Illuminate\Database\Eloquent\Collection $partrecipients
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

	public function partrecipients()
	{
		return $this->hasMany(\App\Models\Partrecipient::class, 'recipientID');
	}
}
