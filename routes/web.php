<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::redirect('/about', '/#about');

Route::get('/home', 'HomeController@index')->name('home');

