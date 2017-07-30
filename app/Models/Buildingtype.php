<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Buildingtype
 */
class Buildingtype extends Model
{
    protected $table = 'buildingtypes';

    protected $primaryKey = 'buildingTypeID';

	public $timestamps = false;

    protected $fillable = [
        'buildingTypeName',
        'status',
        'archive'
    ];

    protected $guarded = [];



}