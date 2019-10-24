<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'uid',
		'message',
		'password',
		'created_at',
		'updated_at',
		'deleted_at',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'uid',
		'message',
		'password',
	];

	protected $attributes = [
		'id' => null,
		'uid' => null,
		'message' => null,
		'password' => null,
		'created_at' => null,
		'updated_at' => null,
		'deleted_at' => null
	];
}
