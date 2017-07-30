<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Voter
 */
class Voter extends Model
{
    protected $table = 'voters';

    protected $primaryKey = 'voterPrimeID';

	public $timestamps = false;

    protected $fillable = [
        'votersID',
        'datVoter',
        'peoplePrimeID',
        'status',
        'archive'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getVotersID() {
		return $this->votersID;
	}

	/**
	 * @return mixed
	 */
	public function getDatVoter() {
		return $this->datVoter;
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
	public function setVotersID($value) {
		$this->votersID = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setDatVoter($value) {
		$this->datVoter = $value;
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