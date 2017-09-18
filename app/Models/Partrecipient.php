<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 18 Sep 2017 06:54:44 +0000.
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
