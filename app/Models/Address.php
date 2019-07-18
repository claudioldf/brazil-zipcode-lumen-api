<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Address extends Model
{
	public $timestamps = false;

	public function neighborhood()
	{
		return $this->belongsTo(App\Models\Neighborhood::class);
	}

	public function city()
	{
		return $this->belongsTo(App\Models\City::class);
	}

	public function state()
	{
		return $this->belongsTo(App\Models\State::class);
	}

	static public function search(Array $filters) : \Illuminate\Database\Eloquent\Collection	{
		$query = self::distinct()->select([
			'addresses.name',
			'neighborhoods.name as neighborhood_name',
			'cities.name as city_name',
			'states.abbr as state_abbr'
		])
		->leftJoin('states', function($join){
			$join->on('states.id', '=', 'addresses.state_id');
		})
		->leftJoin('cities', function($join){
			$join->on('cities.id', '=', 'addresses.city_id');
			$join->on('cities.state_id', '=', 'addresses.state_id');
		})
		->leftJoin('neighborhoods', function($join){
			$join->on('neighborhoods.id', '=', 'addresses.neighborhood_id');
			$join->on('neighborhoods.city_id', '=', 'addresses.city_id');
			$join->on('neighborhoods.state_id', '=', 'addresses.state_id');
		})
		->limit(100);

		if(count($filters) == 0) {
			return new \Illuminate\Database\Eloquent\Collection();
		}

		if(!empty($filters['address'])) {
			$filters['address'] = str_replace(["rua", "av.", "av"], null, $filters['address']);

			$query->where('addresses.name', 'like', '%'.strip_tags($filters['address']).'%');
		}

		if(!empty($filters['zipcode'])) {
			$filters['zipcode'] = str_replace('/\D/', null, $filters['zipcode']);

			$query->where('addresses.zipcode', '=', $filters['zipcode']);
		}

		if(!empty($filters['city_name'])) {
			$query->where('cities.name', 'like', '%'.strip_tags($filters['city_name']).'%');
		}

		if(!empty($filters['state_abbr'])) {
			$query->where('states.abbr', '=', $filters['state_abbr']);
		}

		return $query->get();
	}
}