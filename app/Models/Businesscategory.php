<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Businesscategory
 */
class Businesscategory extends Model
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