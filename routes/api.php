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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/','ApiController@api');

Route::post('/distance','ApiController@distance');
Route::post('/add_user','AkunController@add');

Route::post('/login_scan/{uuid_login}','ApiController@login_scan');
Route::post('login','ApiController@login');
Route::get('/detail/{id}','ApiController@detail');