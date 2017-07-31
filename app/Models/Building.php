<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Building
 */
class Building extends Model
{
    protected $table = 'buildings';

    protected $primaryKey = 'buildingID';

	public $timestamps = false;

    protected $fillable = [
        'lotID',
        'buildingName',
        'buildingTypeID',
        'status',
        'archive'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getLotID() {
		return $this->lotID;
	}

	/**
	 * @return mixed
	 */
	public function getBuildingName() {
		return $this->buildingName;
	}

	/**
	 * @return mixed
	 */
	public function getBuildingTypeID() {
		return $this->buildingTypeID;
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
	public function setLotID($value) {
		$this->lotID = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setBuildingName($value) {
		$this->buildingName = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setBuildingTypeID($value) {
		$this->buildingTypeID = $value;
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