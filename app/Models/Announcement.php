<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Announcement
 */
class Announcement extends Model
{
    protected $table = 'announcements';

    protected $primaryKey = 'announcementID';

	public $timestamps = false;

    protected $fillable = [
        'announcementName',
        'announcementDesc',
        'announcementDate',
        'employeePrimeID'
    ];

    protected $guarded = [];

        
}