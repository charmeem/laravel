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
use App\Staff;


Route::get('/', function () {
    return view('welcome');
});

//Create Photo for a particular Staff
Route::get('/create', function(){

    $staff = Staff::find(2);

    $staff->photos()->create(['path'=>'mona.jpg']);

});

Route::get('/read', function (){
   $staff = Staff::findOrFail(1);
   foreach($staff->photos as $photo){
       echo $photo->path . "<br>";
   }
});

Route::get('/update', function(){
    $staff = Staff::findOrFail(1);
    $photo = $staff->photos()->whereId(1)->first();
    $photo->path = "no_dabloo.jpg";
    $photo->save();
});

Route::get('/delete', function(){
   $staff = Staff::findOrFail(1);
   $staff->photos()->delete();
});