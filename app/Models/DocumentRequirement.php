<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 08 Oct 2017 10:41:00 +0800.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class DocumentRequirement
 * 
 * @property int $primeID
 * @property int $documentPrimeID
 * @property int $requirementID
 * @property int $quantity
 * 
 * @property \App\Models\Document $document
 * @property \App\Models\Requirement $requirement
 *
 * @package App\Models
 */
class DocumentRequirement extends Eloquent
{
	protected $primaryKey = 'primeID';
	public $timestamps = false;

	protected $casts = [
		'documentPrimeID' => 'int',
		'requirementID' => 'int',
		'quantity' => 'int'
	];

	protected $fillable = [
		'documentPrimeID',
		'requirementID',
		'quantity'
	];

	public function document()
	{
		return $this->belongsTo(\App\Models\Document::class, 'documentPrimeID');
	}

	public function requirement()
	{
		return $this->belongsTo(\App\Models\Requirement::class, 'requirementID');
	}
}
