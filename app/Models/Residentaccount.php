<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Residentaccount
 */
class ResidentAccount extends Model
{
    protected $table = 'residentaccounts';

    protected $primaryKey = 'accountPrimeID';

	public $timestamps = false;

    protected $fillable = [
        'accountID',
        'username',
        'password',
        'accessCode',
        'status',
        'archive',
        'peoplePrimeID'
    ];

    protected $guarded = [];

    {{getters}}

    {{setters}}


}