<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('user/create', 'App\Http\Controllers\ApiController@createUser');
Route::post('user/createaddress/{user}', 'App\Http\Controllers\ApiController@createAddress');
Route::get('user', 'App\Http\Controllers\ApiController@getUsers');
Route::get('user/get/{user}', 'App\Http\Controllers\ApiController@getUserbyId');
Route::put('user/edit/{id}', 'App\Http\Controllers\ApiController@updateUser');
Route::put('user/editaddress/{user}/{id}', 'App\Http\Controllers\ApiController@updateAddress');
Route::delete('user/delete/{id}', 'App\Http\Controllers\ApiController@deleteUser');
Route::delete('user/deleteaddress/{id}', 'App\Http\Controllers\ApiController@deleteAddress');

