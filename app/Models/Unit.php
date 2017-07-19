<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Unit
 */
class Unit extends Model
{
    protected $table = 'units';

    protected $primaryKey = 'unitID';

	public $timestamps = false;

    protected $fillable = [
        'unitCode',
        'lotID',
        'status',
        'archive',
        'houseID',
        'buildingID'
    ];

    protected $guarded = [];
}