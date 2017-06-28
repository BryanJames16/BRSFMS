<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Address
 */
class Address extends Model
{
    protected $table = 'addresses';

    protected $primaryKey = 'addressID';

	public $timestamps = false;

    protected $fillable = [
        'city',
        'municipality',
        'province',
        'lotID',
        'houseID',
        'unitID',
        'status',
        'archive'
    ];

    protected $guarded = [];

        
}