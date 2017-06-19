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

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/',['as'=>'home','uses'=>'SiteController']);
// Route for list view of articles of specific category
Route::get('/category/{slug}','Site\ArticleController@index');
Route::get('/directory/{directory}','Site\DirectoryController@showCategories');


Auth::routes();


Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'admin'], function () {
    Route::resource('directory','Admin\DirectoryController');
    //Route::get('/',['as'=>'admin.dashboard','uses'=>'DashboardController']);
    //Route::resource('fields','Admin\FieldsController');
    Route::get('/settings/{prefix}',['as'=>'settings.prefix','uses'=>'Admin\SettingsController@prefix']);
    Route::post('/settings/prefix',['as'=>'settings.storeprefix','uses'=>'Admin\SettingsController@storePrefix']);
    Route::resource('settings','Admin\SettingsController');

    Route::get('directory-types',['as'=>'directory.type.index','uses'=>'Admin\DirectoryTypeController@index']);

    Route::get('/{directory_slug}/categories',['as'=>'admin.categories','uses'=>'Admin\CategoriesController@index']);
    Route::get('/{directory_slug}/listings',['as'=>'admin.listings','uses'=>'Admin\ArticlesController@index']);
});