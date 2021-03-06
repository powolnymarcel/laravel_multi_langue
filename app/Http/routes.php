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
    route::get('form','PagesController@getForms');
    route::get('bootstrapselements','PagesController@getBootstrapselements');
    route::get('tables','PagesController@getTables');
    route::get('bootstrapsgrid','PagesController@getBootstrapsgrid');
    route::get('addtranslation','PagesController@getAddtranslation');
    route::get('listtranslation','PagesController@getListtranslation');
    route::post('addtranslation','ConfigController@getAddtranslation');
    Route::controllers([
            'config'=>'ConfigController'
    ]);
});


Route::controller('language','LanguageController');



Route::get('index', function () {
    return view('frontend.index');
});


Route::get('/', function () {
    return view('welcome');
});
