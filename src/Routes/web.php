<?php

Route::prefix('cms')->namespace('LaravelCMS\Controllers')->group(function () {
    Route::get('/', 'DashboardController@index')->name('cms::dashboard');
    Route::prefix('/translations')->group(function () {
        Route::get('/', 'TransController@index')->name('cms::trans.index');
        Route::get('/add', 'TransController@create')->name('cms::trans.create');
        Route::post('/store', 'TransController@store')->name('cms::trans.store');
    });
});
