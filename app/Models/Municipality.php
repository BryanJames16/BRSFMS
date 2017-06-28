<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Municipality
 */
class Municipality extends Model
{
    protected $table = 'municipalities';

    protected $primaryKey = 'municipalityID';

	public $timestamps = false;

    protected $fillable = [
        'municipalityName',
        'provinceID',
        'status',
        'archive'
    ];

    protected $guarded = [];

        
}