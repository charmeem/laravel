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

Route::get('test', function() {
    return " Hi brother";
});

Route::get('home', function() {
    return view('home');
});

Route::get('/product/{category}/{item}', function ($category, $item) {
    return "Hi, Do you want to buy a Product " . $item . " from Category " . $category;
});

// Call to my first controller
Route::get('/post', 'PostController@index');