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

Route::apiResource('/user', 'Api\v1\PersonController')
    ->only(['show','destroy','update','store']);
Route::apiResource('/index', 'Api\v1\PersonController')
    ->only('index');

/*Route::prefix('v1')->group(function(){
    Route::apiResource('/person', 'Api\v1\PersonController')
        ->only(['show','destroy','update','store']);
    Route::apiResource('/index', 'Api\v1\PersonController')
        ->only('index');
});*/

//Route::get('/user/{person}','Api\v1\PersonController@show');
//Route::POST('/user}','Api\v1\PersonController@store');
Route::apiResource('/user/1/list', 'Api\v1\listController')
    ->only(['show','destroy','update','store','index']);

/*use GuzzleHttp\Client;
Route::get('/json-api', function() {
    $client = new Client();

    $response = $client->request('GET', 'https://api.postalpincode.in/pincode/110001');
    $statusCode = $response->getStatusCode();
    $body = $response->getBody()->getContents();

    return $body;
});*/
Route::get('json-api', 'Api\v1\PersonController@get_api');

