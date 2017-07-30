<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Residentbackground
 */
class Residentbackground extends Model
{
    protected $table = 'residentbackgrounds';

    protected $primaryKey = 'backgroundPrimeID';

	public $timestamps = false;

    protected $fillable = [
        'currentWork',
        'monthlyIncome',
        'peoplePrimeID',
        'status',
        'archive'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getCurrentWork() {
		return $this->currentWork;
	}

	/**
	 * @return mixed
	 */
	public function getMonthlyIncome() {
		return $this->monthlyIncome;
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
	public function setCurrentWork($value) {
		$this->currentWork = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setMonthlyIncome($value) {
		$this->monthlyIncome = $value;
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