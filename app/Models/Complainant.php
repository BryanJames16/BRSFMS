<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Complainant
 */
class Complainant extends Model
{
    protected $table = 'complainants';

    protected $primaryKey = 'complainantPrimeID';

	public $timestamps = false;

    protected $fillable = [
        'casePrimeID',
        'peoplePrimeID'
    ];

    protected $guarded = [];

        
}