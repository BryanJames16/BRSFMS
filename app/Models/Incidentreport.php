<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Incidentreport
 */
class Incidentreport extends Model
{
    protected $table = 'incidentreport';

    protected $primaryKey = 'reportPrimeID';

	public $timestamps = false;

    protected $fillable = [
        'reportID',
        'reportName',
        'reportDesc',
        'reportDate',
        'status',
        'accountPrimeID'
    ];

    protected $guarded = [];

        
}