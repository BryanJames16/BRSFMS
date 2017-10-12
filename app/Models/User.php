<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 12 Oct 2017 18:00:10 +0800.
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
 * @property string $position
 * @property int $accept
 * @property int $archive
 * @property int $approval
 * @property int $resident
 * @property int $request
 * @property int $reservation
 * @property int $service
 * @property int $business
 * @property int $collection
 * @property int $sponsorship
 * 
 * @property \Illuminate\Database\Eloquent\Collection $logs
 * @property \Illuminate\Database\Eloquent\Collection $messages
 *
 * @package App\Models
 */
class User extends Eloquent
{
	protected $casts = [
		'accept' => 'int',
		'archive' => 'int',
		'approval' => 'int',
		'resident' => 'int',
		'request' => 'int',
		'reservation' => 'int',
		'service' => 'int',
		'business' => 'int',
		'collection' => 'int',
		'sponsorship' => 'int'
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
		'position',
		'accept',
		'archive',
		'approval',
		'resident',
		'request',
		'reservation',
		'service',
		'business',
		'collection',
		'sponsorship'
	];

	public function logs()
	{
		return $this->hasMany(\App\Models\Log::class, 'userID');
	}

	public function messages()
	{
		return $this->hasMany(\App\Models\Message::class, 'senderID');
	}
}
