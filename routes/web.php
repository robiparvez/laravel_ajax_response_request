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
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
//
Route::get('/getMessage', function (){
	if(Request::ajax()){
		return 'caught message';
	}
});


Route::post('register', function() {
    if(Request::ajax()){
    	return Response::json(Request::all());
    }
});