<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\State;
use App\Utils\ApiResponse;

class StatesController extends Controller
{

  public function index()
  {
    $states = State::all();

    return response()->json($states);
  }
}
