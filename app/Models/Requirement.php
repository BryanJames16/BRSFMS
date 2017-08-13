<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 13 Aug 2017 04:58:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Requirement
 * 
 * @property int $requirementID
 * @property string $requirementName
 * @property string $requirementDesc
 * @property int $status
 * @property int $archive
 * @property int $documentPrimeID
 * 
 * @property \App\Models\Document $document
 *
 * @package App\Models
 */
class Requirement extends Eloquent
{
	protected $primaryKey = 'requirementID';
	public $timestamps = false;

	protected $casts = [
		'status' => 'int',
		'archive' => 'int',
		'documentPrimeID' => 'int'
	];

	protected $fillable = [
		'requirementName',
		'requirementDesc',
		'status',
		'archive',
		'documentPrimeID'
	];

	public function document()
	{
		return $this->belongsTo(\App\Models\Document::class, 'documentPrimeID');
	}
}
