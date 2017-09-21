<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 20 Sep 2017 17:12:11 +0000.
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
 * @property int $approval
 * @property string $position
 * @property int $accept
 * @property int $archive
 * 
 * @property \Illuminate\Database\Eloquent\Collection $messages
 *
 * @package App\Models
 */
class User extends Eloquent
{
	protected $casts = [
		'approval' => 'int',
		'accept' => 'int',
		'archive' => 'int'
	];

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
		'imagePath',
		'approval',
		'position',
		'accept',
		'archive'
	];

	public function messages()
	{
		return $this->hasMany(\App\Models\Message::class, 'senderID');
	}
}
