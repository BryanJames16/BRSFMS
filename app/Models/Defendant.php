<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Defendant
 */
class Defendant extends Model
{
    protected $table = 'defendants';

    protected $primaryKey = 'defendantPrimeID';

	public $timestamps = false;

    protected $fillable = [
        'casePrimeID',
        'peoplePrimeID'
    ];

    protected $guarded = [];

        
}