<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Generaladdress
 */
class Generaladdress extends Model
{
    protected $table = 'generaladdresses';

    protected $primaryKey = 'personAddressID';

	public $timestamps = false;

    protected $fillable = [
        'addressType',
        'residentPrimeID',
        'facilitiesPrimeID',
        'businessPrimeID',
        'unitID',
        'streetID',
        'lotID',
        'buildingID'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getAddressType() {
		return $this->addressType;
	}

	/**
	 * @return mixed
	 */
	public function getResidentPrimeID() {
		return $this->residentPrimeID;
	}

	/**
	 * @return mixed
	 */
	public function getFacilitiesPrimeID() {
		return $this->facilitiesPrimeID;
	}

	/**
	 * @return mixed
	 */
	public function getBusinessPrimeID() {
		return $this->businessPrimeID;
	}

	/**
	 * @return mixed
	 */
	public function getUnitID() {
		return $this->unitID;
	}

	/**
	 * @return mixed
	 */
	public function getStreetID() {
		return $this->streetID;
	}

	/**
	 * @return mixed
	 */
	public function getLotID() {
		return $this->lotID;
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
	public function setAddressType($value) {
		$this->addressType = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setResidentPrimeID($value) {
		$this->residentPrimeID = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setFacilitiesPrimeID($value) {
		$this->facilitiesPrimeID = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setBusinessPrimeID($value) {
		$this->businessPrimeID = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setUnitID($value) {
		$this->unitID = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setStreetID($value) {
		$this->streetID = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setLotID($value) {
		$this->lotID = $value;
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