<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Businessregistration
 */
class Businessregistration extends Model
{
    protected $table = 'businessregistrations';

    protected $primaryKey = 'registrationPrimeID';

	public $timestamps = false;

    protected $fillable = [
        'registrationID',
        'registrationDate',
        'businessPrimeID',
        'peoplePrimeID'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getRegistrationID() {
		return $this->registrationID;
	}

	/**
	 * @return mixed
	 */
	public function getRegistrationDate() {
		return $this->registrationDate;
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
	public function getPeoplePrimeID() {
		return $this->peoplePrimeID;
	}


    
	/**
	 * @param $value
	 * @return $this
	 */
	public function setRegistrationID($value) {
		$this->registrationID = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setRegistrationDate($value) {
		$this->registrationDate = $value;
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
	public function setPeoplePrimeID($value) {
		$this->peoplePrimeID = $value;
		return $this;
	}



}