<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Reservation
 */
class Reservation extends Model
{
    protected $table = 'reservations';

    protected $primaryKey = 'primeID';

	public $timestamps = false;

    protected $fillable = [
        'reservationName',
        'reservationDescription',
        'reservationStart',
        'reservationEnd',
        'dateReserved',
        'peoplePrimeID',
        'facilityPrimeID',
        'status'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getReservationName() {
		return $this->reservationName;
	}

	/**
	 * @return mixed
	 */
	public function getReservationDescription() {
		return $this->reservationDescription;
	}

	/**
	 * @return mixed
	 */
	public function getReservationStart() {
		return $this->reservationStart;
	}

	/**
	 * @return mixed
	 */
	public function getReservationEnd() {
		return $this->reservationEnd;
	}

	/**
	 * @return mixed
	 */
	public function getDateReserved() {
		return $this->dateReserved;
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
	public function getFacilityPrimeID() {
		return $this->facilityPrimeID;
	}

	/**
	 * @return mixed
	 */
	public function getStatus() {
		return $this->status;
	}


    
	/**
	 * @param $value
	 * @return $this
	 */
	public function setReservationName($value) {
		$this->reservationName = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setReservationDescription($value) {
		$this->reservationDescription = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setReservationStart($value) {
		$this->reservationStart = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setReservationEnd($value) {
		$this->reservationEnd = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setDateReserved($value) {
		$this->dateReserved = $value;
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
	public function setFacilityPrimeID($value) {
		$this->facilityPrimeID = $value;
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



}