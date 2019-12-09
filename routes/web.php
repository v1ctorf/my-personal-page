<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
});

Auth::routes();

Route::redirect('about', '/#about');
Route::get('home', 'HomeController@index')->name('home');
Route::get('blog', 'PostController@index')->name('blog');

Route::resource('post', 'PostController');
Route::get('post/{criteria}', 'PostController@show');

Route::middleware('auth')->group(function(){
    Route::prefix('arbitrage')->group(function(){        
        Route::prefix('scenarios')->group(function(){
            Route::get('', 'ArbitrageController@index')->name('arbitrage');
            Route::get('snapshot', 'ArbitrageController@snapshotAll')->name('snapshot-all');

            Route::prefix('{name}')->group(function(){
                Route::get('', 'ArbitrageController@show')->name('scenario');
                Route::get('snapshot', 'ArbitrageController@snapshot')->name('snapshot');
                Route::get('activate', 'ArbitrageController@activate')->name('activate');
                Route::get('deactivate', 'ArbitrageController@deactivate')->name('deactivate');
            });            
        });        
    });
});
