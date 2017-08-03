<?php

namespace App\Models;

class Document extends \App\Models\Base\Document
{
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
}
