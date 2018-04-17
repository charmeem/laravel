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
use App\Role;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function(){
   $user = User::find(1);
   $role = new Role(['name'=>'Author']);
   $user->roles()->save($role);
});

Route::get('/read', function (){
   $user = User::find(1);
   foreach($user->roles as $role){
       echo $role->name;
   }
});

Route::get('/update', function (){
   $user = User::findOrFail(1);
   if($user->has('roles')){
       foreach($user->roles as $role){
           if ($role->name=='Subscriberr'){
               $role->name = 'subscriber';
               $role->save();
           }
       }
   }
});

Route::get('/delete', function(){
   $user = User::findOrFail(2);
   foreach($user->roles as $role){
       $role->whereId(4)->delete();
   }
});

//attaches a user with a role id and create new entry in user_role table everytime
Route::get('/attach', function(){
    $user = User::findOrFail(1);
    $user->roles()->attach(3);
});

Route::get('/detach', function(){
    $user = User::findOrFail(2);
    $user->roles()->detach(4);
    //detaches all the roles associated with this id in user_role table
});

// sync same as attaches but only attaches once in user_role table
Route::get('/sync', function(){
    $user = User::findOrFail(1);
    $user->roles()->sync([1]);
});