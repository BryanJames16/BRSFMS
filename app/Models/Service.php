<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 */
class Service extends Model
{
    protected $table = 'services';

    protected $primaryKey = 'primeID';

	public $timestamps = false;

    protected $fillable = [
        'serviceID',
        'serviceName',
        'serviceDesc',
        'typeID',
        'status',
        'archive'
    ];

    protected $guarded = [];

        
}