<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 24 Aug 2017 15:09:38 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Familymember
 * 
 * @property int $familyMemberPrimeID
 * @property int $familyPrimeID
 * @property int $peoplePrimeID
 * @property string $memberRelation
 * @property bool $archive
 * 
 * @property \App\Models\Family $family
 * @property \App\Models\Resident $resident
 *
 * @package App\Models
 */
class Familymember extends Eloquent
{
	protected $primaryKey = 'familyMemberPrimeID';
	public $timestamps = false;

	protected $casts = [
		'familyPrimeID' => 'int',
		'peoplePrimeID' => 'int',
		'archive' => 'bool'
	];

	protected $fillable = [
		'familyPrimeID',
		'peoplePrimeID',
		'memberRelation',
		'archive'
	];

	public function family()
	{
		return $this->belongsTo(\App\Models\Family::class, 'familyPrimeID');
	}

	public function resident()
	{
		return $this->belongsTo(\App\Models\Resident::class, 'peoplePrimeID');
	}
}
