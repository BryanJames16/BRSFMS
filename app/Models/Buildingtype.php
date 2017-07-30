<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Buildingtype
 */
class Buildingtype extends Model
{
    protected $table = 'buildingtypes';

    protected $primaryKey = 'buildingTypeID';

	public $timestamps = false;

    protected $fillable = [
        'buildingTypeName',
        'status',
        'archive'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getBuildingTypeName() {
		return $this->buildingTypeName;
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
	public function setBuildingTypeName($value) {
		$this->buildingTypeName = $value;
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