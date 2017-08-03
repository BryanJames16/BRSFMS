<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Business
 */
class Business extends Model
{
    protected $table = 'businesses';

    protected $primaryKey = 'businessPrimeID';

	public $timestamps = false;

    protected $fillable = [
        'businessID',
        'businessName',
        'businessDesc',
        'businessType',
        'categoryPrimeID',
        'status',
        'archive'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getBusinessID() {
		return $this->businessID;
	}

	/**
	 * @return mixed
	 */
	public function getBusinessName() {
		return $this->businessName;
	}

	/**
	 * @return mixed
	 */
	public function getBusinessDesc() {
		return $this->businessDesc;
	}

	/**
	 * @return mixed
	 */
	public function getBusinessType() {
		return $this->businessType;
	}

	/**
	 * @return mixed
	 */
	public function getCategoryPrimeID() {
		return $this->categoryPrimeID;
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
	public function setBusinessID($value) {
		$this->businessID = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setBusinessName($value) {
		$this->businessName = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setBusinessDesc($value) {
		$this->businessDesc = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setBusinessType($value) {
		$this->businessType = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setCategoryPrimeID($value) {
		$this->categoryPrimeID = $value;
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