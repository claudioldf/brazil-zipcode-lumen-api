<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class State extends Model
{
	public $timestamps = false;

	public function cities()
	{
		return $this->hasMany('App\Models\City');
	}
}