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


Route::get('/', 'PagesController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/mentor/home', 'MentorController@index');
Route::get('/mentor', 'MentorController@index');

Route::get('/mentor/register', 'MentorController@register');
Route::post('/mentor/register', 'MentorController@mentor_info');

Route::resource('mentor/families', 'MentorFamilyController');

Route::get('mentor/families/post/{id}', 'MentorFamilyPostController@index');
Route::post('mentor/families/post/{id}', 'MentorFamilyPostController@store');
Route::get('mentor/families/post/{id}/edit', 'MentorFamilyPostController@edit');
Route::post('mentor/families/post/{id}/update', 'MentorFamilyPostController@update');
Route::get('mentor/families/post/{id}/delete', 'MentorFamilyPostController@delete');




