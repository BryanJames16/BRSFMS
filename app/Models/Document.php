<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Document
 */
class Document extends Model
{
    protected $table = 'documents';

    protected $primaryKey = 'primeID';

	public $timestamps = false;

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

    protected $guarded = [];


}