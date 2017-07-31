<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Businesscategory
 */
class Businesscategory extends Model
{
    protected $table = 'businesscategories';

    protected $primaryKey = 'categoryPrimeID';

	public $timestamps = false;

    protected $fillable = [
        'categoryName',
        'categoryDesc',
        'status',
        'archive'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getCategoryName() {
		return $this->categoryName;
	}

	/**
	 * @return mixed
	 */
	public function getCategoryDesc() {
		return $this->categoryDesc;
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
	public function setCategoryName($value) {
		$this->categoryName = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setCategoryDesc($value) {
		$this->categoryDesc = $value;
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