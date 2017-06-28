<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Barangay
 */
class Barangay extends Model
{
    protected $table = 'barangays';

    protected $primaryKey = 'barangayID';

	public $timestamps = false;

    protected $fillable = [
        'barangayName',
        'status',
        'archive'
    ];

    protected $guarded = [];

        
}