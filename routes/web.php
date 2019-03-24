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


