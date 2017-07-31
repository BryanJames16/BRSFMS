<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Familymember
 */
class Familymember extends Model
{
    protected $table = 'familymembers';

    protected $primaryKey = 'familyMemberPrimeID';

	public $timestamps = false;

    protected $fillable = [
        'familyPrimeID',
        'peoplePrimeID',
        'memberRelation',
        'archive'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getFamilyPrimeID() {
		return $this->familyPrimeID;
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
	public function getMemberRelation() {
		return $this->memberRelation;
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
	public function setFamilyPrimeID($value) {
		$this->familyPrimeID = $value;
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
	public function setMemberRelation($value) {
		$this->memberRelation = $value;
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