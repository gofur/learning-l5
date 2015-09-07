<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('contact', function(){
// 	return view('pages.contact');
// });

Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');
//ini digunakan jika harus login dulu ke page tersebut
Route::get('about',['middleware'=> 'auth', 'uses' =>'PagesController@about']) ;
Route::get('contact','PagesController@contact');
Route::resource('articles','ArticlesController');
Route::controllers(['auth'=> 'Auth\AuthController', 'password' => 'Auth\PasswordController']);
Route::get('foo', ['middleware'=>'manager',function()
{
	return 'this page may only be viewed by managers';
}]);