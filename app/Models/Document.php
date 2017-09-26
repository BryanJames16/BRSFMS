<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 26 Sep 2017 21:32:51 +0800.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Document
 * 
 * @property int $primeID
 * @property string $documentID
 * @property string $documentName
 * @property string $documentDescription
 * @property string $documentContent
 * @property string $documentType
 * @property float $documentPrice
 * @property bool $status
 * @property bool $archive
 * 
 * @property \Illuminate\Database\Eloquent\Collection $requirements
 * @property \Illuminate\Database\Eloquent\Collection $documentrequests
 *
 * @package App\Models
 */
class Document extends Eloquent
{
	protected $primaryKey = 'primeID';
	public $timestamps = false;

	protected $casts = [
		'documentPrice' => 'float',
		'status' => 'bool',
		'archive' => 'bool'
	];

	protected $fillable = [
		'documentID',
		'documentName',
		'documentDescription',
		'documentContent',
		'documentType',
		'documentPrice',
		'status',
		'archive'
	];

	public function requirements()
	{
		return $this->belongsToMany(\App\Models\Requirement::class, 'document_requirements', 'documentPrimeID', 'requirementID')
					->withPivot('primeID', 'quantity');
	}

	public function documentrequests()
	{
		return $this->hasMany(\App\Models\Documentrequest::class, 'documentsPrimeID');
	}
}
