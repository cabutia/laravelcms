<?php

Route::prefix('cms')->namespace('LaravelCMS\Controllers')->group(function () {
    Route::get('/', 'DashboardController@index')->name('cms::dashboard');
    Route::prefix('/translations')->group(function () {
        Route::get('/', 'TransController@index')->name('cms::trans.index');
        Route::get('/add', 'TransController@create')->name('cms::trans.create');
        Route::post('/store', 'TransController@store')->name('cms::trans.store');
        Route::prefix('/languages')->group(function () {
            Route::get('/', 'TransController@languages')->name('cms::trans.languages.index');
            Route::get('/add', 'TransController@addLanguage')->name('cms::trans.languages.create');
            Route::get('/edit/{slug}', 'TransController@editLanguage')->name('cms::trans.languages.edit');
            Route::post('/update', 'TransController@updateLanguage')->name('cms::trans.languages.update');
            Route::post('/store', 'TransController@storeLanguage')->name('cms::trans.languages.store');
            Route::post('/delete', 'TransController@deleteLanguage')->name('cms::trans.languages.delete');
        });
    });
});
