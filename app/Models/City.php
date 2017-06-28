<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 */
class City extends Model
{
    protected $table = 'cities';

    protected $primaryKey = 'cityID';

	public $timestamps = false;

    protected $fillable = [
        'cityName',
        'provinceID',
        'status',
        'archive'
    ];

    protected $guarded = [];

        
}