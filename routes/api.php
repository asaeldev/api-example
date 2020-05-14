<?php

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// HTTP GET http://localhost:8000/api/v1/person
Route::middleware('auth:api')->get('/v1/person', 'PersonController@index');

// HTTP GET http://localhost:8000/api/v1/person/11
Route::middleware('auth:api')->get('/v1/person/{id}', 'PersonController@view');

// HTTP POST http://localhost:8000/api/v1/person
Route::post('/v1/person', 'PersonController@store');

// HTTP DELETE http://localhost:8000/api/v1/person/10
Route::delete('/v1/person/{id}', 'PersonController@destroy');

// HTTP PUT http://localhost:8000/api/v1/person/10
Route::put('/v1/person/{id}', 'PersonController@updatePut');


