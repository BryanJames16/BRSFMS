<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Documentdetailrequest
 */
class Documentdetailrequest extends Model
{
    protected $table = 'documentdetailrequests';

    public $timestamps = false;

    protected $fillable = [
        'documentDetailPrimeID',
        'headerPrimeID',
        'documentPrimeID',
        'quantity'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getDocumentDetailPrimeID() {
		return $this->documentDetailPrimeID;
	}

	/**
	 * @return mixed
	 */
	public function getHeaderPrimeID() {
		return $this->headerPrimeID;
	}

	/**
	 * @return mixed
	 */
	public function getDocumentPrimeID() {
		return $this->documentPrimeID;
	}

	/**
	 * @return mixed
	 */
	public function getQuantity() {
		return $this->quantity;
	}


    
	/**
	 * @param $value
	 * @return $this
	 */
	public function setDocumentDetailPrimeID($value) {
		$this->documentDetailPrimeID = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setHeaderPrimeID($value) {
		$this->headerPrimeID = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setDocumentPrimeID($value) {
		$this->documentPrimeID = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setQuantity($value) {
		$this->quantity = $value;
		return $this;
	}



}