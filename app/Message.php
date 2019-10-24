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
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'message',
		'password',
	];
}
