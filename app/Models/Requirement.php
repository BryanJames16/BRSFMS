<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 25 Aug 2017 15:47:18 +0000.
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
 * 
 * @property \Illuminate\Database\Eloquent\Collection $documents
 *
 * @package App\Models
 */
class Requirement extends Eloquent
{
	protected $primaryKey = 'requirementID';
	public $timestamps = false;

	protected $casts = [
		'status' => 'int',
		'archive' => 'int'
	];

	protected $fillable = [
		'requirementName',
		'requirementDesc',
		'status',
		'archive'
	];

	public function documents()
	{
		return $this->belongsToMany(\App\Models\Document::class, 'document_requirements', 'requirementID', 'documentPrimeID')
					->withPivot('primeID', 'quantity');
	}
}
