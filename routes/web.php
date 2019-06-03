<?php
use App\Http\Controllers\FrontendController;

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

Route::get('/', 'FrontendController@index');

Route::get('detail/{id}/{slug}.html', 'FrontendController@show');

Route::post('detail/{id}/{slug}.html', 'FrontendController@postComment');

Route::get('category/{id}/{slug}.html', 'FrontendController@getCategory');

Route::get('search', 'FrontendController@getSearch');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'login', 'middleware' => 'CheckLogedIn'], function () {
        Route::get('/', 'LoginController@index');
        Route::post('/', 'LoginController@store');
    });

    Route::get('logout', 'HomeController@getLogout');

    Route::group(['prefix' => 'admin', 'middleware' => 'CheckLogedOut'], function () {
        Route::get('home', 'HomeController@index');

        Route::group(['prefix' => 'category'], function () {
            Route::get('/', 'CategoryController@index');

            Route::post('/', 'CategoryController@store');

            Route::get('edit/{id}', 'CategoryController@edit');

            Route::post('edit/{id}', 'CategoryController@update');

            Route::get('destroy/{id}', 'CategoryController@destroy');
        });

        // Route for products
        Route::group(['prefix' => 'product'], function () {
            Route::get('/', 'ProductController@index');

            Route::get('add', 'ProductController@create');

            Route::post('add', 'ProductController@store');

            Route::get('edit/{id}', 'ProductController@edit');

            Route::post('edit/{id}', 'ProductController@update');

            Route::get('destroy/{id}', 'ProductController@destroy');
        });
    });
});
