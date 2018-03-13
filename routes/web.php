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
    if(Auth::check()){
        
    }
    return view('home');
});

Route::get('logout', function(){
    Auth::logout();
    return view('notification', ['notification' => "pleas log in!"]);
});
Route::get('/searchForApplication', 'CompetenceController@getApplication');

Route::get('/', 'CompetenceController@getCompetenciesByUserId');

Route::get('/search', function () {
    if(Auth::user()->role == 'admin'){
        return view('search');
    } else return view('home');
});

Route::get('/viewApplications', 'CompetenceController@getApplications');

Route::get('/viewApplication', 'CompetenceController@getApplicationById');


//redirects all /upload-routes to the HomeController, function = upload
Route::get('/upload', 'HomeController@upload');
//redirects all /add-routes to the HomeController, function = add
Route::get('/add', 'HomeController@add');

Route::get('/uploadCompetenceProfile', 'CompetenceController@uploadCompetence');

Route::get('/check', function(){
        return "You are     logged in!";
})->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
