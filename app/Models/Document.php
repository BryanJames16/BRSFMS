<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 13 Aug 2017 04:58:27 +0000.
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
 * @property \Illuminate\Database\Eloquent\Collection $documentdetailrequests
 * @property \Illuminate\Database\Eloquent\Collection $requirements
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

	public function documentdetailrequests()
	{
		return $this->hasMany(\App\Models\Documentdetailrequest::class, 'documentPrimeID');
	}

	public function requirements()
	{
		return $this->hasMany(\App\Models\Requirement::class, 'documentPrimeID');
	}
}
