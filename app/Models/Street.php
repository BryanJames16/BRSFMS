<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Street
 */
class Street extends Model
{
    protected $table = 'streets';

    protected $primaryKey = 'streetID';

	public $timestamps = false;

    protected $fillable = [
        'streetName',
        'barangayID',
        'status',
        'archive'
    ];

    protected $guarded = [];
}