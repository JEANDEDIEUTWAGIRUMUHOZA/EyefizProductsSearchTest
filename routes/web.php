<?php

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

Route::get('/', function () {
    return view('welcome');
});

/*GET route to display the index.blade.php vue 
by calling index function in ProductController*/

Route::get('/boutique','ProductController@index')->name('products.index');

/* products routes */

Route::get('/boutique{slug}', 'ProductController@show')->name('products.show');
Route::get('/search', 'ProductController@search')->name('products.search');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
