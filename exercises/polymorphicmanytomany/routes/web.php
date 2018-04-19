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
use App\Post;
use App\Video;
use App\Tag;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function(){
    $post = Post::create(['name'=>'Mubashir last post']);
    $tag1 = Tag::find(1);
    $post->tags()->save($tag1);

    $video = Video::create(['name'=>'My last video']);
    $tag2 = Tag::find(2);
    $video->tags()->save($tag2);

});

Route::get('/read', function(){
   $post = Post::findOrFail(7);
   foreach($post->tags as $tag){
       echo $tag;
   }
});

Route::get('/update', function(){
    $post = Post::find(7);
    foreach($post->tags as $tag){
        $tag->whereName('Laravel')->update(['name'=>'PHP']);
    }
});


Route::get('/delete', function(){
    $post=Post::findOrFail(1);
    $post->delete();
});