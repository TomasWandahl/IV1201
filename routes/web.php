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
    return view('home');
});

Route::get('/upload', 'HomeController@upload');

Route::get('/check', function(){
    if(Auth::check()){
        return "You are logged in!";
    } else {
        return "Your are NOT logged in!";
    }
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
