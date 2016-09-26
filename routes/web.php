<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route::get('/', function () {
//    return view('index');
//});

Route::get('/', 'PagesController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/mentor/home', 'MentorController@index');

Route::get('/register/mentor', 'MentorController@register');

Route::get('/about', function () {
    return 'Yeah!!, It Works! :)';
});

