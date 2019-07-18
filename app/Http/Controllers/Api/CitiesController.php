<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\State;
use App\Utils\ApiResponse;

class CitiesController extends Controller
{

  public function index(String $state_uf)
  {
    $state = State::where('abbr', strtoupper($state_uf))->first();
    $cities = $state->cities;

    return response()->json($cities);
  }
}
