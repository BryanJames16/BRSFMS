<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Employeeposition
 */
class Employeeposition extends Model
{
    protected $table = 'employeeposition';

    protected $primaryKey = 'positionID';

	public $timestamps = false;

    protected $fillable = [
        'positionName',
        'positionDate',
        'positionLevel',
        'status',
        'archive',
        'employeePrimeID'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getPositionName() {
		return $this->positionName;
	}

	/**
	 * @return mixed
	 */
	public function getPositionDate() {
		return $this->positionDate;
	}

	/**
	 * @return mixed
	 */
	public function getPositionLevel() {
		return $this->positionLevel;
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
	public function getEmployeePrimeID() {
		return $this->employeePrimeID;
	}


    
	/**
	 * @param $value
	 * @return $this
	 */
	public function setPositionName($value) {
		$this->positionName = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setPositionDate($value) {
		$this->positionDate = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setPositionLevel($value) {
		$this->positionLevel = $value;
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
	public function setEmployeePrimeID($value) {
		$this->employeePrimeID = $value;
		return $this;
	}



}