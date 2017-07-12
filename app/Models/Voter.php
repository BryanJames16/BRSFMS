<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Voter
 */
class Voter extends Model
{
    protected $table = 'voters';

    protected $primaryKey = 'voterPrimeID';

	public $timestamps = false;

    protected $fillable = [
        'votersID',
        'datVoter',
        'peoplePrimeID',
        'status',
        'archive'
    ];

    protected $guarded = [];
}