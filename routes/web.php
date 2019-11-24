<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
});

Auth::routes();

Route::redirect('/about', '/#about');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('post', 'PostController');
Route::get('/blog', 'PostController@index')->name('blog');
Route::get('/post/{criteria}', 'PostController@show');

Route::middleware('auth')->group(function(){
    Route::get('arbitrage', 'ArbitrageController@index')->name('arbitrage');
    Route::get('scenario/{name}', 'ArbitrageController@show')->name('scenario');
});
