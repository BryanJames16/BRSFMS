<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Case
 */
class Case extends Model
{
    protected $table = 'cases';

    protected $primaryKey = 'casePrimeID';

	public $timestamps = false;

    protected $fillable = [
        'caseID',
        'caseName',
        'caseDesc',
        'status'
    ];

    protected $guarded = [];

        
}