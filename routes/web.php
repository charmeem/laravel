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

//Route::get('test', function() {
//    return " Hi brother";
//});
//
//Route::get('home', function() {
//    return view('home');
//});
//
//Route::get('/product/{category}/{item}', function ($category, $item) {
//    return "Hi, Do you want to buy a Product " . $item . " from Category " . $category;
//});
//
//// Call to my first controller
//Route::get('/post/{id}', 'PostController@index');

// Create automatic multiple Routes using Resource- check with php artsan route:list command
Route::resource('post', 'PostController');

// Creating Route for Contact page
Route::get('/contact', 'PostController@contact');

// Post page with multiple parameters and passing data to view
Route::get('/post/{id}/{name}/{address}', 'PostController@show_post');