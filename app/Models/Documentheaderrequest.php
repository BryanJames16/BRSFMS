<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Documentheaderrequest
 */
class DocumentHeaderRequest extends Model
{
    protected $table = 'documentheaderrequests';

    protected $primaryKey = 'documentHeaderPrimeID';

	public $timestamps = false;

    protected $fillable = [
        'requestID',
        'requestDate',
        'status',
        'peoplePrimeID'
    ];

    protected $guarded = [];
}