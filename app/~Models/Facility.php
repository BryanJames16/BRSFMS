<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Facility
 */
class Facility extends Model
{
    protected $table = 'facilities';

    protected $primaryKey = 'primeID';

	public $timestamps = false;

    protected $fillable = [
        'facilityID',
        'facilityName',
        'facilityDesc',
        'status',
        'archive',
        'facilityTypeID',
        'facilityDayPrice',
        'facilityNightPrice'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getFacilityID() {
		return $this->facilityID;
	}

	/**
	 * @return mixed
	 */
	public function getFacilityName() {
		return $this->facilityName;
	}

	/**
	 * @return mixed
	 */
	public function getFacilityDesc() {
		return $this->facilityDesc;
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
	public function getFacilityTypeID() {
		return $this->facilityTypeID;
	}

	/**
	 * @return mixed
	 */
	public function getFacilityDayPrice() {
		return $this->facilityDayPrice;
	}

	/**
	 * @return mixed
	 */
	public function getFacilityNightPrice() {
		return $this->facilityNightPrice;
	}


    
	/**
	 * @param $value
	 * @return $this
	 */
	public function setFacilityID($value) {
		$this->facilityID = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setFacilityName($value) {
		$this->facilityName = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setFacilityDesc($value) {
		$this->facilityDesc = $value;
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
	public function setFacilityTypeID($value) {
		$this->facilityTypeID = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setFacilityDayPrice($value) {
		$this->facilityDayPrice = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setFacilityNightPrice($value) {
		$this->facilityNightPrice = $value;
		return $this;
	}



}