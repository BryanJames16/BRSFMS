<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Aerson
 */
class Person extends Model
{
    protected $table = 'people';

    protected $primaryKey = 'peoplePrimeID';

	public $timestamps = false;

    protected $fillable = [
        'personID',
        'firstName',
        'middleName',
        'lastName',
        'suffix',
        'contactNumber',
        'gender',
        'status',
        'archive'
    ];

    protected $guarded = [];

}