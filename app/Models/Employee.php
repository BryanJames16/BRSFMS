<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 */
class Employee extends Model
{
    protected $table = 'employees';

    protected $primaryKey = 'primeID';

	public $timestamps = false;

    protected $fillable = [
        'employeeID',
        'registrationID',
        'username',
        'password',
        'status',
        'archive'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getEmployeeID() {
		return $this->employeeID;
	}

	/**
	 * @return mixed
	 */
	public function getRegistrationID() {
		return $this->registrationID;
	}

	/**
	 * @return mixed
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * @return mixed
	 */
	public function getPassword() {
		return $this->password;
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
	public function setEmployeeID($value) {
		$this->employeeID = $value;
		return $this;
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
	public function setUsername($value) {
		$this->username = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setPassword($value) {
		$this->password = $value;
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