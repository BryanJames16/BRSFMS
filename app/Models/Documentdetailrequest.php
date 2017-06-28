<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Documentdetailrequest
 */
class Documentdetailrequest extends Model
{
    protected $table = 'documentdetailrequests';

    public $timestamps = false;

    protected $fillable = [
        'documentDetailPrimeID',
        'headerPrimeID',
        'documentPrimeID',
        'quantity'
    ];

    protected $guarded = [];

        
}