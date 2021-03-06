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
        Route::get('/thong-ke','HomeController@statistic')->name('home.statistic');
        Route::get('/ajax/get-quantity-product','HomeController@ajaxGetQuantityProduct')->name('home.ajax.get_quantity_product');
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
        Route::group(['prefix' => 'employee'], function (){
            Route::get('/index','EmployeeController@index')->name('employee.index');
            Route::any('/add','EmployeeController@add')->name('employee.add');
            Route::any('/edit','EmployeeController@edit')->name('employee.edit');
            Route::get('/delete','EmployeeController@delete')->name('employee.delete');
        });
        Route::group(['prefix' => 'service'], function (){
            Route::get('/index','ServiceController@index')->name('service.index');
            Route::any('/add','ServiceController@add')->name('service.add');
            Route::any('/edit','ServiceController@edit')->name('service.edit');
            Route::get('/delete','ServiceController@delete')->name('service.delete');
        });
        Route::group(['prefix' => 'product'], function (){
            Route::get('/index','ProductController@index')->name('product.index');
            Route::any('/add','ProductController@add')->name('product.add');
            Route::any('/edit','ProductController@edit')->name('product.edit');
            Route::get('/delete','ProductController@delete')->name('product.delete');
        });
        Route::group(['prefix' => 'customer'], function (){
            Route::get('/index','CustomerController@index')->name('customer.index');
            Route::any('/add','CustomerController@add')->name('customer.add');
            Route::any('/edit','CustomerController@edit')->name('customer.edit');
            Route::get('/delete','CustomerController@delete')->name('customer.delete');
            Route::any('/birthday','CustomerController@birthday')->name('customer.birthday');
        });
        Route::group(['prefix' => 'consumption'], function (){
            Route::get('/index','ConsumptionController@index')->name('consumption.index');
            Route::any('/add','ConsumptionController@add')->name('consumption.add');
            Route::any('/edit','ConsumptionController@edit')->name('consumption.edit');
            Route::get('/delete','ConsumptionController@delete')->name('consumption.delete');
        });
    });
});
