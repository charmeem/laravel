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
use App\User;
use App\Address;

Route::get('/', function () {
    return view('welcome');
});

/**
 * Insert operation - C of CRUD
 * Creating a record in address table using user table relationship
 */

Route::get('/insert/{id}', function($id) {

    $user = User::findOrFail($id);

    $address = new Address(['name'=>'Nespak Society 195 D1']);

    $user->address()->save($address);

});

/**
 * Read operation - R of CRUD
 * Reading address of particular user using one to one relation
 */

Route::get('/read/{id}', function ($id){

    $user = User::findOrFail($id);

    return $user->address->name;

});

/**
 * Update operation - U of CRUD
 * updating address of particular user using address model
 * It can also be done using User model
 */

Route::get('/update/{id}', function($id){

    $address = Address::whereUserId($id)->first();

   $address->name='Putzgasse 14 Herzogenrath';

   $address->save();
});



/**
 * Delete operation - D of CRUD
 */

Route::get('/delete', function() {
    $user = User::findOrFail(1);

    $user->address()->delete();
});