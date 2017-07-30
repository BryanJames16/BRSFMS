<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 */
class User extends Model
{
    protected $table = 'users';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
        'firstName',
        'middleName',
        'lastName',
        'suffix',
        'imagePath'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @return mixed
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @return mixed
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * @return mixed
	 */
	public function getRememberToken() {
		return $this->remember_token;
	}

	/**
	 * @return mixed
	 */
	public function getFirstName() {
		return $this->firstName;
	}

	/**
	 * @return mixed
	 */
	public function getMiddleName() {
		return $this->middleName;
	}

	/**
	 * @return mixed
	 */
	public function getLastName() {
		return $this->lastName;
	}

	/**
	 * @return mixed
	 */
	public function getSuffix() {
		return $this->suffix;
	}

	/**
	 * @return mixed
	 */
	public function getImagePath() {
		return $this->imagePath;
	}


    
	/**
	 * @param $value
	 * @return $this
	 */
	public function setName($value) {
		$this->name = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setEmail($value) {
		$this->email = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setPassword($value) {
		$this->password = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setRememberToken($value) {
		$this->remember_token = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setFirstName($value) {
		$this->firstName = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setMiddleName($value) {
		$this->middleName = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setLastName($value) {
		$this->lastName = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setSuffix($value) {
		$this->suffix = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setImagePath($value) {
		$this->imagePath = $value;
		return $this;
	}



}