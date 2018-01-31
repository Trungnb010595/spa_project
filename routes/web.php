<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::group([], function (){
    Route::group(['namespace' => 'Home'], function (){
        Route::get('/','HomeController@index')->name('home');
        Route::group(['prefix' => 'exchange'], function (){
            Route::get('/index','ExchangeController@index')->name('exchange.index');
            Route::any('/add','ExchangeController@add')->name('exchange.add');
            Route::any('/edit','ExchangeController@edit')->name('exchange.edit');
            Route::get('/delete','ExchangeController@delete')->name('exchange.delete');
        });
        Route::group(['prefix' => 'time_off'], function (){
            Route::get('/index','TimeOffController@index')->name('time_off.index');
            Route::any('/add','TimeOffController@add')->name('time_off.add');
            Route::any('/edit','TimeOffController@edit')->name('time_off.edit');
            Route::get('/delete','TimeOffController@delete')->name('time_off.delete');
        });
    });
});
