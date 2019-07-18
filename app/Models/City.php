<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class City extends Model
{
	public $timestamps = false;

	public function state()
	{
		return $this->belongsTo(App\Models\State::class);
	}
}