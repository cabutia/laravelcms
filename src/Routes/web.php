<?php

Route::prefix('cms')->group(function () {
    Route::get('/', 'LaravelCMS\Controllers\DashboardController@index')->name('cms:index');
});
