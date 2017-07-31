<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Residentregistration
 */
class Residentregistration extends Model
{
    protected $table = 'residentregistrations';

    protected $primaryKey = 'registrationID';

	public $timestamps = false;

    protected $fillable = [
        'registrationDate',
        'employeePrimeID',
        'peoplePrimeID'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getRegistrationDate() {
		return $this->registrationDate;
	}

	/**
	 * @return mixed
	 */
	public function getEmployeePrimeID() {
		return $this->employeePrimeID;
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
	public function setRegistrationDate($value) {
		$this->registrationDate = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setEmployeePrimeID($value) {
		$this->employeePrimeID = $value;
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