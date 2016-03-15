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
	Route::get('search', ['middleware' => 'web', 'uses' => 'SearchController@index']);
	Route::resource('artworks', 'ArtworkController');
	Route::get('/artwork/{id}', 'ArtworkController@show');
});

Route::group(['middleware' => ['auth']], function () {


});

Route::group(['middleware' => ['web']], function () {
    Route::auth();
    Route::delete('/artwork/{id}', 'ArtworkController@destroy');
	Route::get('/artwork/{id}/edit', 'ArtworkController@edit');
	Route::get('artworks', ['middleware' => 'web','uses' => 'ArtworkController@index']);

	Route::any('getdata', function() {
		$term = Input::get('term');
		$data = DB::table("artworks")->distinct()->select('artwork')->where('artwork', 'LIKE', $term.'%' )->groupBy('artwork')->take(10)->get();
		foreach ($data as $v) {
			$return_array[] = array('value' => $v->artwork);
		}
		return Response::json($return_array);
	});


});
