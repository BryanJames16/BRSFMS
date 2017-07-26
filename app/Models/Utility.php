<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Utility
 */
class Utility extends Model
{
    protected $table = 'utilities';

    protected $primaryKey = 'sysUtilID';

	public $timestamps = false;

    protected $fillable = [
        'brgyName',
        'brgyInitAddress',
        'docFormat',
        'fclFormat',
        'servFormat',
        'busFormat',
        'buildingFormat',
        'residentFormat',
        'familyFormat',
        'resFormat',
        'docReqFormat',
        'servPartFormat',
        'servSponFormat',
        'busRegFormat'
    ];

    protected $guarded = [];

    {{getters}}

    {{setters}}


}