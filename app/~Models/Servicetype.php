<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Servicetype
 */
class Servicetype extends Model
{
    protected $table = 'servicetypes';

    protected $primaryKey = 'typeID';

	public $timestamps = false;

    protected $fillable = [
        'typeName',
        'typeDesc',
        'status',
        'archive'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getTypeName() {
		return $this->typeName;
	}

	/**
	 * @return mixed
	 */
	public function getTypeDesc() {
		return $this->typeDesc;
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
	public function setTypeName($value) {
		$this->typeName = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setTypeDesc($value) {
		$this->typeDesc = $value;
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