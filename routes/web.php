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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@userLogout')->name('user.logout');

	Route::get('foods/{slug}', ['as' => 'foods.single', 'uses' =>'FoodController@getSingle'])->where('slug', '[\w\d\-\_]+');
	//dropdown(right)
	Route::get('foods', ['uses' => 'FoodController@getIndex', 'as'=>'foods.index']);
	
	
//Resource	
	Route::resource('menus', 'TblmenuController');
	Route::resource('categories', 'TblmenucategoryController');


