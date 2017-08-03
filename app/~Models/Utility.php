<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Utility
 */
class Utility extends Model
{
    protected $table = 'utilities';

    protected $primaryKey = 'utilityID';

	public $timestamps = false;

    protected $fillable = [
        'barangayName',
        'chairmanName',
        'address',
        'brgyLogoPath',
        'provLogoPath',
        'facilityPK',
        'documentPK',
        'servicePK',
        'residentPK',
        'familyPK',
        'docRequestPK',
        'docApprovalPK',
        'reservationPK',
        'serviceRegPK',
        'sponsorPK'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getBarangayName() {
		return $this->barangayName;
	}

	/**
	 * @return mixed
	 */
	public function getChairmanName() {
		return $this->chairmanName;
	}

	/**
	 * @return mixed
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * @return mixed
	 */
	public function getBrgyLogoPath() {
		return $this->brgyLogoPath;
	}

	/**
	 * @return mixed
	 */
	public function getProvLogoPath() {
		return $this->provLogoPath;
	}

	/**
	 * @return mixed
	 */
	public function getFacilityPK() {
		return $this->facilityPK;
	}

	/**
	 * @return mixed
	 */
	public function getDocumentPK() {
		return $this->documentPK;
	}

	/**
	 * @return mixed
	 */
	public function getServicePK() {
		return $this->servicePK;
	}

	/**
	 * @return mixed
	 */
	public function getResidentPK() {
		return $this->residentPK;
	}

	/**
	 * @return mixed
	 */
	public function getFamilyPK() {
		return $this->familyPK;
	}

	/**
	 * @return mixed
	 */
	public function getDocRequestPK() {
		return $this->docRequestPK;
	}

	/**
	 * @return mixed
	 */
	public function getDocApprovalPK() {
		return $this->docApprovalPK;
	}

	/**
	 * @return mixed
	 */
	public function getReservationPK() {
		return $this->reservationPK;
	}

	/**
	 * @return mixed
	 */
	public function getServiceRegPK() {
		return $this->serviceRegPK;
	}

	/**
	 * @return mixed
	 */
	public function getSponsorPK() {
		return $this->sponsorPK;
	}


    
	/**
	 * @param $value
	 * @return $this
	 */
	public function setBarangayName($value) {
		$this->barangayName = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setChairmanName($value) {
		$this->chairmanName = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setAddress($value) {
		$this->address = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setBrgyLogoPath($value) {
		$this->brgyLogoPath = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setProvLogoPath($value) {
		$this->provLogoPath = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setFacilityPK($value) {
		$this->facilityPK = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setDocumentPK($value) {
		$this->documentPK = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setServicePK($value) {
		$this->servicePK = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setResidentPK($value) {
		$this->residentPK = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setFamilyPK($value) {
		$this->familyPK = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setDocRequestPK($value) {
		$this->docRequestPK = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setDocApprovalPK($value) {
		$this->docApprovalPK = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setReservationPK($value) {
		$this->reservationPK = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setServiceRegPK($value) {
		$this->serviceRegPK = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setSponsorPK($value) {
		$this->sponsorPK = $value;
		return $this;
	}



}