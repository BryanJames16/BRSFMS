<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Lot
 */
class Lot extends Model
{
    protected $table = 'lots';

    protected $primaryKey = 'lotID';

	public $timestamps = false;

    protected $fillable = [
        'lotCode',
        'streetID',
        'status',
        'archive'
    ];

    protected $guarded = [];

        
}