<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', 'HomeController@index');
    Route::resource('home', 'HomeController');
	Route::get('artworks', ['middleware' => 'web','uses' => 'ArtworksController@index']);
	Route::get('search', ['middleware' => 'web', 'uses' => 'SearchController@index']);
	Route::resource('artworks', 'ArtworksController');
	Route::delete('/artworks/{id}', 'ArtworkController@destroy');
});

Route::group(['middleware' => ['auth']], function () {


});

Route::group(['middleware' => ['web']], function () {
    Route::auth();

});
