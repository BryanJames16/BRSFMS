<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 */
class Service extends Model
{
    protected $table = 'services';

    protected $primaryKey = 'primeID';

	public $timestamps = false;

    protected $fillable = [
        'serviceID',
        'serviceName',
        'serviceDesc',
        'typeID',
        'status',
        'archive'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getServiceID() {
		return $this->serviceID;
	}

	/**
	 * @return mixed
	 */
	public function getServiceName() {
		return $this->serviceName;
	}

	/**
	 * @return mixed
	 */
	public function getServiceDesc() {
		return $this->serviceDesc;
	}

	/**
	 * @return mixed
	 */
	public function getTypeID() {
		return $this->typeID;
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
	public function setServiceID($value) {
		$this->serviceID = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setServiceName($value) {
		$this->serviceName = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setServiceDesc($value) {
		$this->serviceDesc = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setTypeID($value) {
		$this->typeID = $value;
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