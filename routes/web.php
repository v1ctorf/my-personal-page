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

Route::prefix('arbitrage')->middleware('auth')->group(function(){
    Route::view('', 'arbitrage.index')->name('arbitrage');

    Route::prefix('currencies')->group(function(){
        Route::get('', 'ArbitrageController@currencies')->name('currencies');

        Route::prefix('{identifier}')->group(function(){
            Route::get('update-tx-fee', 'ArbitrageController@updateTxFee')->name('update-tx-fee');
            Route::get('update-in-usd', 'ArbitrageController@updateInUsd')->name('update-in-usd');
        });
    });

    Route::prefix('exchanges')->group(function(){
        Route::get('', 'ArbitrageController@exchanges')->name('exchanges');

        Route::prefix('{exchange}')->group(function(){
            Route::get('', 'ArbitrageController@exchange')->name('exchange');

            Route::prefix('fee')->group(function(){
                Route::get('check', 'ArbitrageController@checkExchangeFee')->name('check-exchange-fee');
                Route::get('verify', 'ArbitrageController@verifyExchangeFee')->name('verify-exchange-fee');
            });
        });
    });

    Route::prefix('scenarios')->group(function(){
        Route::view('', 'arbitrage.scenarios')->name('scenarios');
        Route::get('snapshot', 'ArbitrageController@snapshotAll')->name('snapshot-all');

        Route::prefix('{name}')->group(function(){
            Route::get('', 'ArbitrageController@show')->name('scenario');
            Route::get('history', 'ArbitrageController@history')->name('scenario-history');
        });
    });
});
