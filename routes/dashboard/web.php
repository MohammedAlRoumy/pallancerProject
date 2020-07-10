<?php

use Illuminate\Support\Facades\Route;


Route::get('/clear', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});


Route::prefix('dashboard')
    ->name('dashboard.')
    ->middleware(['auth', 'role:super_admin|admin'])
    ->group(function () {

        Route::get('/', 'WelcomeController@index')->name('welcome');

        // Categories route
        Route::get('categories/changeStatus', 'CategoryController@changeStatus')->name('categories.changeStatus');
        Route::resource('categories', 'CategoryController')->except(['show']);

        //author route
        Route::resource('authors', 'AuthorController');

        // books route
       // Route::get('categories/changeStatus', 'CategoryController@changeStatus')->name('categories.changeStatus');
        Route::resource('books', 'BookController');


        //role route
        Route::resource('roles', 'RoleController')->except(['show']);

        //user route
        Route::get('users/changeStatus', 'UserController@changeStatus')->name('users.changeStatus');
        Route::resource('users', 'UserController')->except(['show']);

        Route::get('/settings/social_links', 'SettingController@social_links')->name('settings.social_links');
        Route::post('/settings','SettingController@store')->name('settings.store');


        Route::resource('aboutus', 'AboutUsController');

        Route::resource('contactus', 'ContactUsController')->only(['index','show','destroy']);

    });

