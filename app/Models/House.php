<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class House
 */
class House extends Model
{
    protected $table = 'houses';

    protected $primaryKey = 'houseID';

	public $timestamps = false;

    protected $fillable = [
        'houseCode',
        'lotID',
        'status',
        'archive'
    ];

    protected $guarded = [];



}