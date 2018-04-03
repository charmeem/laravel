<?php
use App\Post;

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
|--------------------------------------------------------------------------
| Raw MySql operations
|--------------------------------------------------------------------------
|
| Here we are trying to test raw mysql before learning ORM
|
*/

// insert operation
//Route::get('/insert', function () {
//
//    DB::insert('insert into posts(title, content, is_admin) values(?, ?, ?)', ['Mufti e-shop', 'I am aiming to create a single eshop', 1]);
//    DB::insert('insert into posts(title, content, is_admin) values(?, ?, ?)', ['Mufti e-mall', 'I am aiming to create online shopping mall', 1]);
//    DB::insert('insert into posts(title, content, is_admin) values(?, ?, ?)', ['Mufti e-galleria', 'I am aiming to create another shopping mall', 1]);
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
//Route::get('/delete', function () {
//   $deleted = DB::delete('delete from posts where id = ?', [4]);
//
//   return $deleted;
//});

/*
|--------------------------------------------------------------------------
| Eloquent ORM
|--------------------------------------------------------------------------
| We created a Model 'Post' by artisan command, see the lazy
| Then we use namespace App\Post above to access the model
|
*/

// Read operation - all

Route::get('/read', function () {
    $posts = Post::all();

    foreach($posts as $post) {
        echo $post->title;
    }
});

// find particular object

Route::get('/find', function () {
    $post = Post::find(7);

    return $post->title;
});

// Conditional find
Route::get('/findwhere', function () {
    $posts = Post::where('id', 6)->orderBy('id', 'desc')->take(3)->get();
    return($posts);
});

// findorfail
Route::get('/findorfail', function() {
    $post = Post::findOrFail(7);
    echo $post;
});

// Basic Insert method
Route::get('/basicinsert', function() {
    $post = new Post;
    $post->title = "Children Garments";
    $post->content = " My first shop will have Children Garments";
    $post->is_admin = 0;
    $post->save();    // This will insert as well as update the database
});

// Another way to update record
Route::get('/basicinsert2', function () {
    $post = Post::find(8);

    $post->content = " This shop will have Children Garments";
    $post->is_admin = 0;
    $post->save();    // This will insert as well as update the database

});

// Create data method, mass assignment- another way to insert data
Route::get('/create', function (){
    Post::create(['title'=> 'Create method',
                   'content' => 'This row is created by using create method of laravel',
                   'is_admin' => '1']);
});

// update method
Route::get('/update', function () {
    Post::where('id', 5)->where('is_admin', 1)->update(['content'=>'shop using UPDATE method']);
});

// delete method
Route::get('/delete', function (){
    $post = Post::find(8);
    $post->delete();
});

// another delete method
Route::get('/delete2', function (){
    //Post::destroy(5,7);
    Post::where('is_admin', 1)->delete();
});


