<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sysutil
 */
class Sysutil extends Model
{
    protected $table = 'sysutil';

    protected $primaryKey = 'sysUtilID';

	public $timestamps = false;

    protected $fillable = [
        'brgyName'
    ];

    protected $guarded = [];


}