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

/*
 *  Testing raw mysql
 */

// insert operation
//Route::get('/insert', function () {
//
//    DB::insert('insert into posts(title, content, is_admin) values(?, ?, ?)', ['Mufti e-mall', 'I am aiming to create online shopping mall', 1]);
//
//});

// Read or select Operation
//Route::get('/select', function () {
//   $result = DB::select('select * from posts where id = ?', [1]);
//   foreach ($result as $post) {
//       return $post->content;
//   }
//});

// Update operation
//Route::get('/update', function () {
//   $updated = DB::update('update posts set content = "Mufti e- shopping Mall" where id = ?', [3]);
//   return $updated;
//});

// Delete operation
Route::get('/delete', function () {
   $deleted = DB::delete('delete from posts where id = ?', [3]);
   return $deleted;
});