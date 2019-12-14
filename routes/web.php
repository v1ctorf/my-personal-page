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
Route::get('blog', 'PostController@index')->name('blog');

Route::resource('post', 'PostController');
Route::get('post/{criteria}', 'PostController@show');

Route::middleware('auth')->group(function(){
    Route::view('home', 'home')->name('home');

    Route::prefix('arbitrage')->group(function(){
        Route::view('', 'arbitrage.index')->name('arbitrage');
        
        Route::prefix('currencies')->group(function(){
            Route::get('', 'ArbitrageController@currencies')->name('currencies');
            Route::get('{identifier}/update-tx-fee', 'ArbitrageController@updateTxFee')->name('update-tx-fee');
        });
        
        Route::prefix('exchanges')->group(function(){
            Route::get('', 'ArbitrageController@exchanges')->name('exchanges');
            Route::prefix('{exchange}')->group(function(){
                Route::get('', 'ArbitrageController@exchange')->name('exchange');
                Route::get('check-exchange-fee', 'ArbitrageController@checkExchangeFee')->name('check-exchange-fee');
            });
        });

        Route::prefix('scenarios')->group(function(){
            Route::get('', 'ArbitrageController@index')->name('scenarios');
            Route::get('snapshot', 'ArbitrageController@snapshotAll')->name('snapshot-all');

            Route::prefix('{name}')->group(function(){
                Route::get('', 'ArbitrageController@show')->name('scenario');
                Route::get('snapshot', 'ArbitrageController@snapshot')->name('snapshot');
                Route::get('activate', 'ArbitrageController@activate')->name('activate');
                Route::get('deactivate', 'ArbitrageController@deactivate')->name('deactivate');
                Route::get('history', 'ArbitrageController@history')->name('scenario-history');
            });            
        });        
    });
});
