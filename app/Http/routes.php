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


Route::resource('admin','BackendController');
Route::group(['prefix'=>'pages'],function(){
    route::get('form','PagesController@getForm');
    route::get('bootstrapselements','PagesController@getBootstrapselements');
    route::get('tables','PagesController@getTables');
    route::get('bootstrapsgrid','PagesController@getBootstrapsgrid');

});

Route::controller('language','LanguageController');



Route::get('index', function () {
    return view('frontend.index');
});


Route::get('/', function () {
    return view('welcome');
});
