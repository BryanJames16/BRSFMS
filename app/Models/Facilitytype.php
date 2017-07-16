<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Facilitytype
 */
class FacilityType extends Model
{
    protected $table = 'facilitytypes';

    protected $primaryKey = 'typeID';

	public $timestamps = false;

    protected $fillable = [
        'typeName',
        'status',
        'archive'
    ];

    protected $guarded = [];
}