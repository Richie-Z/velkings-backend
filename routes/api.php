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

Route::post('/register','RegisterController@register');
Route::post('/login','LoginController@login');
Route::post('/logout','LoginController@logout');

Route::get('/bus','BusController@index');
Route::post('/add/bus','BusController@add');

Route::get('/driver','DriverController@index');
Route::post('/add/driver','DriverController@add');
	Route::post('/add/order','OrderController@add');
Route::group(['middleware'=>['auth:sanctum']],function(){
	Route::get('/order','OrderController@index');	
});
