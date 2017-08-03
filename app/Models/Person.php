<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Aerson
 */
class Person extends Model
{
    protected $table = 'people';

    protected $primaryKey = 'peoplePrimeID';

	public $timestamps = false;

    protected $fillable = [
        'personID',
        'firstName',
        'middleName',
        'lastName',
        'suffix',
        'contactNumber',
        'gender',
        'status',
        'archive'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getPersonID() {
		return $this->personID;
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
	public function setPersonID($value) {
		$this->personID = $value;
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