<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 27 Aug 2017 06:44:06 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Requestrequirement
 * 
 * @property int $requestrequirementsID
 * @property int $documentRequestPrimeID
 * @property int $archive
 * @property int $requirementID
 * 
 * @property \App\Models\Documentrequest $documentrequest
 *
 * @package App\Models
 */
class Requestrequirement extends Eloquent
{
	protected $primaryKey = 'requestrequirementsID';
	public $timestamps = false;

	protected $casts = [
		'documentRequestPrimeID' => 'int',
		'archive' => 'int',
		'requirementID' => 'int'
	];

	protected $fillable = [
		'documentRequestPrimeID',
		'archive',
		'requirementID'
	];

	public function documentrequest()
	{
		return $this->belongsTo(\App\Models\Documentrequest::class, 'documentRequestPrimeID');
	}
}
