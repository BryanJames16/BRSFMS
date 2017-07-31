<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Migration
 */
class Migration extends Model
{
    protected $table = 'migrations';

    public $timestamps = false;

    protected $fillable = [
        'migration',
        'batch'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getMigration() {
		return $this->migration;
	}

	/**
	 * @return mixed
	 */
	public function getBatch() {
		return $this->batch;
	}


    
	/**
	 * @param $value
	 * @return $this
	 */
	public function setMigration($value) {
		$this->migration = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setBatch($value) {
		$this->batch = $value;
		return $this;
	}



}