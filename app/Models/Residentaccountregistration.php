<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Residentaccountregistration
 */
class Residentaccountregistration extends Model
{
    protected $table = 'residentaccountregistrations';

    protected $primaryKey = 'registrationID';

	public $timestamps = false;

    protected $fillable = [
        'registrationDate',
        'accountPrimeID'
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
	public function getAccountPrimeID() {
		return $this->accountPrimeID;
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
	public function setAccountPrimeID($value) {
		$this->accountPrimeID = $value;
		return $this;
	}



}