<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Residentbackground
 */
class Residentbackground extends Model
{
    protected $table = 'residentbackgrounds';

    protected $primaryKey = 'backgroundPrimeID';

	public $timestamps = false;

    protected $fillable = [
        'currentWork',
        'monthlyIncome',
        'peoplePrimeID',
        'status',
        'archive'
    ];

    protected $guarded = [];


}