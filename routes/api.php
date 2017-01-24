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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/drink/showdrink','DrinkController@showdrink');
Route::post('/drink/showdetails','DrinkController@showdetails');

Route::get('/categories','DataController@categories');
Route::get('/subcategories','DataController@subcategories');
Route::get('/types','DataController@types');

Route::post('/register/table','TableController@registertable');
Route::post('/neworder','OrderController@takeorder');
Route::get('/order/showorderdetail','OrderDrinkController@orderdetail');
Route::post('/order/completeorder','OrderController@completeorder');
