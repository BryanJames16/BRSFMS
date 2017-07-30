<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Documentheaderrequest
 */
class Documentheaderrequest extends Model
{
    protected $table = 'documentheaderrequests';

    protected $primaryKey = 'documentHeaderPrimeID';

	public $timestamps = false;

    protected $fillable = [
        'requestID',
        'requestDate',
        'status',
        'peoplePrimeID'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getRequestID() {
		return $this->requestID;
	}

	/**
	 * @return mixed
	 */
	public function getRequestDate() {
		return $this->requestDate;
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
	public function getPeoplePrimeID() {
		return $this->peoplePrimeID;
	}


    
	/**
	 * @param $value
	 * @return $this
	 */
	public function setRequestID($value) {
		$this->requestID = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setRequestDate($value) {
		$this->requestDate = $value;
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
	public function setPeoplePrimeID($value) {
		$this->peoplePrimeID = $value;
		return $this;
	}



}