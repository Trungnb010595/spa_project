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
        Route::group(['prefix' => 'employee'], function (){
            Route::get('/index','EmployeeController@index')->name('employee.index');
            Route::get('/add','EmployeeController@add')->name('employee.add');
            Route::get('/edit','EmployeeController@edit')->name('employee.edit');
            Route::get('/delete','EmployeeController@delete')->name('employee.delete');
        });
    });
});
