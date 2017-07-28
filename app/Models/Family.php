<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Family
 */
class Family extends Model
{
    protected $table = 'families';

    protected $primaryKey = 'familyPrimeID';

	public $timestamps = false;

    protected $fillable = [
        'familyID',
        'familyHeadID',
        'familyName',
        'familyRegistrationDate',
        'archive'
    ];

    protected $guarded = [];

    {{getters}}

    {{setters}}


}