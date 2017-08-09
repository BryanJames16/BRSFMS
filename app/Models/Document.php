<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 09 Aug 2017 06:06:43 +0000.
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
}
