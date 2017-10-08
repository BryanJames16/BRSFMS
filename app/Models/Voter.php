<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 09 Oct 2017 00:48:56 +0800.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Voter
 * 
 * @property string $voterPrimeID
 * @property string $votersID
 * @property \Carbon\Carbon $datVoter
 * @property int $peoplePrimeID
 * @property bool $status
 * @property bool $archive
 * 
 * @property \App\Models\Resident $resident
 *
 * @package App\Models
 */
class Voter extends Eloquent
{
	protected $primaryKey = 'voterPrimeID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'peoplePrimeID' => 'int',
		'status' => 'bool',
		'archive' => 'bool'
	];

	protected $dates = [
		'datVoter'
	];

	protected $fillable = [
		'votersID',
		'datVoter',
		'peoplePrimeID',
		'status',
		'archive'
	];

	public function resident()
	{
		return $this->belongsTo(\App\Models\Resident::class, 'peoplePrimeID');
	}
}
