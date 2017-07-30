<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Street
 */
class Street extends Model
{
    protected $table = 'streets';

    protected $primaryKey = 'streetID';

	public $timestamps = false;

    protected $fillable = [
        'streetName',
        'status',
        'archive'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getStreetName() {
		return $this->streetName;
	}

	/**
	 * @return mixed
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * @return mixed
	 */
	public function getArchive() {
		return $this->archive;
	}


    
	/**
	 * @param $value
	 * @return $this
	 */
	public function setStreetName($value) {
		$this->streetName = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setStatus($value) {
		$this->status = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setArchive($value) {
		$this->archive = $value;
		return $this;
	}



}