<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 14 Oct 2017 14:16:32 +0800.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Message
 * 
 * @property int $id
 * @property string $content
 * @property int $senderID
 * @property int $receiverID
 * @property \Carbon\Carbon $dateSent
 * @property int $isRead
 * 
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Message extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'senderID' => 'int',
		'receiverID' => 'int',
		'isRead' => 'int'
	];

	protected $dates = [
		'dateSent'
	];

	protected $fillable = [
		'content',
		'senderID',
		'receiverID',
		'dateSent',
		'isRead'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'senderID');
	}
}
