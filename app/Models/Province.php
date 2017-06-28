<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Province
 */
class Province extends Model
{
    protected $table = 'provinces';

    protected $primaryKey = 'provinceID';

	public $timestamps = false;

    protected $fillable = [
        'provinceName',
        'provinceCode',
        'status',
        'archive'
    ];

    protected $guarded = [];

        
}