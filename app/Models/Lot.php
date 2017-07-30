<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Lot
 */
class Lot extends Model
{
    protected $table = 'lots';

    protected $primaryKey = 'lotID';

	public $timestamps = false;

    protected $fillable = [
        'lotCode',
        'streetID',
        'status',
        'archive'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getLotCode() {
		return $this->lotCode;
	}

	/**
	 * @return mixed
	 */
	public function getStreetID() {
		return $this->streetID;
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
	public function setLotCode($value) {
		$this->lotCode = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setStreetID($value) {
		$this->streetID = $value;
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