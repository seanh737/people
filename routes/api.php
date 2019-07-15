<?php

use Illuminate\Http\Request;

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
//use App\Person;
//Route::get('/person/{person}','PersonController@show');
//Route::apiResource('/person','Api\v1\PersonController');

Route::apiResource('/person', 'Api\v1\PersonController')
    ->only(['show','destroy','update','store']);
Route::apiResource('/index', 'Api\v1\PersonController')
    ->only('index');

/*Route::prefix('v1')->group(function(){
    Route::apiResource('/person', 'Api\v1\PersonController')
        ->only(['show','destroy','update','store']);
    Route::apiResource('/index', 'Api\v1\PersonController')
        ->only('index');
});*/

