<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Building
 */
class Building extends Model
{
    protected $table = 'building';

    protected $primaryKey = 'buildingID';

	public $timestamps = false;

    protected $fillable = [
        'buildingCode',
        'buildingName',
        'buildingType'
    ];

    protected $guarded = [];

}