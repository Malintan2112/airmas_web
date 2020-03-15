<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	// phpinfo();
	return redirect('login');
});
Route::get('/login','WebController@getLogin');
Route::get('register',function(){
	return view('register');
});
Route::group(['middleware'=>'login'],function()
{
	Route::get('home',function(){
		return view('home');
	});
});
Route::post('/create_user','WebController@createUser');
Route::post('login','WebController@postLogin');
Route::post('logout','WebController@postLogout');
