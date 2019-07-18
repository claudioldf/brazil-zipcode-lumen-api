<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Neighborhood extends Model
{
	public $timestamps = false;

	public function addresses()
	{
		return $this->hasMany(App\Models\Address::class);
	}
}