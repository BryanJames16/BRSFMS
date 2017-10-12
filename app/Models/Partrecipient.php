<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 12 Oct 2017 23:36:12 +0800.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Partrecipient
 * 
 * @property int $partrecipientID
 * @property int $participantID
 * @property int $recipientID
 * @property int $quantity
 * @property int $archive
 * 
 * @property \App\Models\Participant $participant
 * @property \App\Models\Recipient $recipient
 *
 * @package App\Models
 */
class Partrecipient extends Eloquent
{
	protected $primaryKey = 'partrecipientID';
	public $timestamps = false;

	protected $casts = [
		'participantID' => 'int',
		'recipientID' => 'int',
		'quantity' => 'int',
		'archive' => 'int'
	];

	protected $fillable = [
		'participantID',
		'recipientID',
		'quantity',
		'archive'
	];

	public function participant()
	{
		return $this->belongsTo(\App\Models\Participant::class, 'participantID');
	}

	public function recipient()
	{
		return $this->belongsTo(\App\Models\Recipient::class, 'recipientID');
	}
}
