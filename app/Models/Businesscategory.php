<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Businesscategory
 */
class BusinessCategory extends Model
{
    protected $table = 'businesscategories';

    protected $primaryKey = 'categoryPrimeID';

	public $timestamps = false;

    protected $fillable = [
        'categoryName',
        'categoryDesc',
        'status',
        'archive'
    ];

    protected $guarded = [];

}