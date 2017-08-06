<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 03 Aug 2017 13:51:32 +0000.
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
