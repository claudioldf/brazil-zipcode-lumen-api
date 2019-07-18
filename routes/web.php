<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
  return "You cann't access by this way!\n\nPlease check the read-me on https://github.com/claudioldf/desafio-backend";
});

$router->group(['prefix' => 'api/'], function($router) {
  $router->get('/states', 'Api\StatesController@index');
  $router->get('/states/{state_uf}/cities', 'Api\CitiesController@index');
  $router->get('/search', 'Api\SearchController@index');
});