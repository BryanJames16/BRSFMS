<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Residentaccount
 */
class Residentaccount extends Model
{
    protected $table = 'residentaccounts';

    protected $primaryKey = 'accountPrimeID';

	public $timestamps = false;

    protected $fillable = [
        'accountID',
        'username',
        'password',
        'accessCode',
        'status',
        'archive',
        'peoplePrimeID'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getAccountID() {
		return $this->accountID;
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
	public function getAccessCode() {
		return $this->accessCode;
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
	public function getPeoplePrimeID() {
		return $this->peoplePrimeID;
	}


    
	/**
	 * @param $value
	 * @return $this
	 */
	public function setAccountID($value) {
		$this->accountID = $value;
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
	public function setAccessCode($value) {
		$this->accessCode = $value;
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
	public function setPeoplePrimeID($value) {
		$this->peoplePrimeID = $value;
		return $this;
	}



}