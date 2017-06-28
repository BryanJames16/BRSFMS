<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Familymember
 */
class Familymember extends Model
{
    protected $table = 'familymembers';

    protected $primaryKey = 'familyMemberPrimeID';

	public $timestamps = false;

    protected $fillable = [
        'memberRelation',
        'peoplePrimeID',
        'status',
        'archive',
        'familyPrimeID'
    ];

    protected $guarded = [];

        
}