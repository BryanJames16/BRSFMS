<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Family
 */
class Family extends Model
{
    protected $table = 'families';

    protected $primaryKey = 'familyPrimeID';

	public $timestamps = false;

    protected $fillable = [
        'familyID',
        'familyHeadID',
        'familyName',
        'familyRegistrationDate',
        'archive'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getFamilyID() {
		return $this->familyID;
	}

	/**
	 * @return mixed
	 */
	public function getFamilyHeadID() {
		return $this->familyHeadID;
	}

	/**
	 * @return mixed
	 */
	public function getFamilyName() {
		return $this->familyName;
	}

	/**
	 * @return mixed
	 */
	public function getFamilyRegistrationDate() {
		return $this->familyRegistrationDate;
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
	public function setFamilyID($value) {
		$this->familyID = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setFamilyHeadID($value) {
		$this->familyHeadID = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setFamilyName($value) {
		$this->familyName = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setFamilyRegistrationDate($value) {
		$this->familyRegistrationDate = $value;
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