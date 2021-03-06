<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'users'], function () {
    Route::get('/', function () {
        dd('This is the users module index page. Build something great!');
    });
});
Route::group(['prefix' => 'admin'], function () {
    Route::resource('users','UsersController');
    Route::resource('roles','RolesController');
    Route::resource('permissions','PermissionsController');
});

