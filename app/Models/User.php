<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 20 Aug 2017 12:36:51 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $created_at
 * @property string $remember_token
 * @property string $firstName
 * @property string $middleName
 * @property string $lastName
 * @property string $suffix
 * @property string $imagePath
 *
 * @package App\Models
 */
class User extends Eloquent
{
	protected $hidden = [
		'password',
		'remember_token'
	];

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
}
