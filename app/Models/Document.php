<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Document
 */
class Document extends Model
{
    protected $table = 'documents';

    protected $primaryKey = 'primeID';

	public $timestamps = false;

    protected $fillable = [
        'documentID',
        'documentName',
        'documentDescription',
        'documentContent',
        'documentType',
        'documentPrice',
        'status',
        'archive'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getDocumentID() {
		return $this->documentID;
	}

	/**
	 * @return mixed
	 */
	public function getDocumentName() {
		return $this->documentName;
	}

	/**
	 * @return mixed
	 */
	public function getDocumentDescription() {
		return $this->documentDescription;
	}

	/**
	 * @return mixed
	 */
	public function getDocumentContent() {
		return $this->documentContent;
	}

	/**
	 * @return mixed
	 */
	public function getDocumentType() {
		return $this->documentType;
	}

	/**
	 * @return mixed
	 */
	public function getDocumentPrice() {
		return $this->documentPrice;
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
	public function setDocumentID($value) {
		$this->documentID = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setDocumentName($value) {
		$this->documentName = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setDocumentDescription($value) {
		$this->documentDescription = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setDocumentContent($value) {
		$this->documentContent = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setDocumentType($value) {
		$this->documentType = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setDocumentPrice($value) {
		$this->documentPrice = $value;
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