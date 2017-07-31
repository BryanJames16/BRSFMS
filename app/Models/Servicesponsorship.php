<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Servicesponsorship
 */
class Servicesponsorship extends Model
{
    protected $table = 'servicesponsorships';

    protected $primaryKey = 'sponsorPrimeID';

	public $timestamps = false;

    protected $fillable = [
        'sponsorshipDate',
        'servicePrimeID',
        'peoplePrimeID',
        'startOfImplementation',
        'endOfImplementation'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getSponsorshipDate() {
		return $this->sponsorshipDate;
	}

	/**
	 * @return mixed
	 */
	public function getServicePrimeID() {
		return $this->servicePrimeID;
	}

	/**
	 * @return mixed
	 */
	public function getPeoplePrimeID() {
		return $this->peoplePrimeID;
	}

	/**
	 * @return mixed
	 */
	public function getStartOfImplementation() {
		return $this->startOfImplementation;
	}

	/**
	 * @return mixed
	 */
	public function getEndOfImplementation() {
		return $this->endOfImplementation;
	}


    
	/**
	 * @param $value
	 * @return $this
	 */
	public function setSponsorshipDate($value) {
		$this->sponsorshipDate = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setServicePrimeID($value) {
		$this->servicePrimeID = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setPeoplePrimeID($value) {
		$this->peoplePrimeID = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setStartOfImplementation($value) {
		$this->startOfImplementation = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setEndOfImplementation($value) {
		$this->endOfImplementation = $value;
		return $this;
	}



}