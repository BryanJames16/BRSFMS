<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Building
 */
class Building extends Model
{
    protected $table = 'buildings';

    protected $primaryKey = 'buildingID';

	public $timestamps = false;

    protected $fillable = [
        'lotID',
        'buildingName',
        'buildingTypeID',
        'status',
        'archive'
    ];

    protected $guarded = [];

    


}