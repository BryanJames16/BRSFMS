<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Servicetype
 */
class Servicetype extends Model
{
    protected $table = 'servicetypes';

    protected $primaryKey = 'typeID';

	public $timestamps = false;

    protected $fillable = [
        'typeName',
        'typeDesc',
        'status',
        'archive'
    ];

    protected $guarded = [];

        
}