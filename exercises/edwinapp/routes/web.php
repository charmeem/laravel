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

/**
 * Created automatically when we run
 * php artisan make:auth
 */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/**
 * Routes added for admin, users
 */


// Admin Main Page route
Route::get('/admin', function (){
   return view('admin.index');
});

/**
 * Middleware - managing security for Admin Users
 *  - first create middleware named Admin through php artisan make:middleware
 *  - then add group as below
 *  - then add code in Admin middleware
 */

Route::group(['middleware'=>'admin'], function (){

    //  creating controller through php artisan make:controller --resource AdminUsersController
    Route::resource('admin/users', 'AdminUsersController');
    // Adding Post section for Admin only. create controller through artisan command
    Route::resource('admin/posts', 'AdminPostsController');
});


