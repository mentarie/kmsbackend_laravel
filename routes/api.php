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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function (){
    Route::resource('employees', 'API\EmployeesController',['except' => ['edit','create']]);
    Route::resource('jobs', 'API\JobsController');
    // Route::post('/create-kms','API\KmsController@create');
    Route::post('/createkms','KmsController@create');
    Route::get('/datakms','KmsController@index');
    Route::delete('/delete/{id}','KmsController@delete');
    Route::post('/update-kms/{id}','KmsController@update');
});

Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
    Route::post('register', 'API\AuthController@register');
    Route::post('login', 'API\AuthController@login');
    Route::post('logout', 'API\AuthController@logout');
    Route::post('refresh', 'API\AuthController@refresh');
    Route::post('me', 'API\AuthController@me');
});
