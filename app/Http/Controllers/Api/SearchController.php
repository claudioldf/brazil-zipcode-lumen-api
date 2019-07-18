<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Address;

class SearchController extends Controller
{

  public function index(Request $request)
  {
    $filters = [
      'address' => $request->get('address'),
      'zipcode'=> $request->get('zipcode'),
      'city_name' => $request->get('city_name'),
      'state_abbr' => $request->get('state_abbr'),
    ];
    
    $results = Address::search($filters);

    return response()->json($results);
  }
}
