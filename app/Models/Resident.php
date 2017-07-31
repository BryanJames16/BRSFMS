<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Resident
 */
class Resident extends Model
{
    protected $table = 'residents';

    protected $primaryKey = 'residentPrimeID';

	public $timestamps = false;

    protected $fillable = [
        'residentID',
        'firstName',
        'middleName',
        'lastName',
        'suffix',
        'contactNumber',
        'gender',
        'birthDate',
        'civilStatus',
        'seniorCitizenID',
        'disabilities',
        'residentType',
        'status'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getResidentID() {
		return $this->residentID;
	}

	/**
	 * @return mixed
	 */
	public function getFirstName() {
		return $this->firstName;
	}

	/**
	 * @return mixed
	 */
	public function getMiddleName() {
		return $this->middleName;
	}

	/**
	 * @return mixed
	 */
	public function getLastName() {
		return $this->lastName;
	}

	/**
	 * @return mixed
	 */
	public function getSuffix() {
		return $this->suffix;
	}

	/**
	 * @return mixed
	 */
	public function getContactNumber() {
		return $this->contactNumber;
	}

	/**
	 * @return mixed
	 */
	public function getGender() {
		return $this->gender;
	}

	/**
	 * @return mixed
	 */
	public function getBirthDate() {
		return $this->birthDate;
	}

	/**
	 * @return mixed
	 */
	public function getCivilStatus() {
		return $this->civilStatus;
	}

	/**
	 * @return mixed
	 */
	public function getSeniorCitizenID() {
		return $this->seniorCitizenID;
	}

	/**
	 * @return mixed
	 */
	public function getDisabilities() {
		return $this->disabilities;
	}

	/**
	 * @return mixed
	 */
	public function getResidentType() {
		return $this->residentType;
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
	public function setResidentID($value) {
		$this->residentID = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setFirstName($value) {
		$this->firstName = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setMiddleName($value) {
		$this->middleName = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setLastName($value) {
		$this->lastName = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setSuffix($value) {
		$this->suffix = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setContactNumber($value) {
		$this->contactNumber = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setGender($value) {
		$this->gender = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setBirthDate($value) {
		$this->birthDate = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setCivilStatus($value) {
		$this->civilStatus = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setSeniorCitizenID($value) {
		$this->seniorCitizenID = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setDisabilities($value) {
		$this->disabilities = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setResidentType($value) {
		$this->residentType = $value;
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