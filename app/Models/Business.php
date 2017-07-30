<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Business
 */
class Business extends Model
{
    protected $table = 'businesses';

    protected $primaryKey = 'businessPrimeID';

	public $timestamps = false;

    protected $fillable = [
        'businessID',
        'businessName',
        'businessDesc',
        'businessType',
        'categoryPrimeID',
        'status',
        'archive'
    ];

    protected $guarded = [];


}