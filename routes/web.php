<?php

Route::view('/', 'welcome')->name('welcome');

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
});

Auth::routes();

Route::redirect('about', '/#about');
Route::get('blog', 'PostController@index')->name('blog');

Route::resource('post', 'PostController');
Route::get('post/{criteria}', 'PostController@show');

Route::view('home', 'home')->name('home')->middleware('auth');
