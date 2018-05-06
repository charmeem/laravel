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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/**
 *  Test route for sending mails
 */

route::get('/sendmail', function(){

    $data = [
        'title' => 'Hello This is Mubashir, CEO of charmeem.com',
        'content' => 'I like to introduce to you my Company , Charmmem.com a software provier'
    ];

    Mail::send('mail.test', $data, function($message){
        $message->to('mmufti@hotmail.com', 'mufti')->subject('Test mail from LAravel/mailgun');
    });



});