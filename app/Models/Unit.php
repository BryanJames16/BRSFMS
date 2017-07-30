<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Unit
 */
class Unit extends Model
{
    protected $table = 'units';

    protected $primaryKey = 'unitID';

	public $timestamps = false;

    protected $fillable = [
        'unitCode',
        'status',
        'archive',
        'buildingID'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getUnitCode() {
		return $this->unitCode;
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
	 * @return mixed
	 */
	public function getBuildingID() {
		return $this->buildingID;
	}


    
	/**
	 * @param $value
	 * @return $this
	 */
	public function setUnitCode($value) {
		$this->unitCode = $value;
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

	/**
	 * @param $value
	 * @return $this
	 */
	public function setBuildingID($value) {
		$this->buildingID = $value;
		return $this;
	}



}