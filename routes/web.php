<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

    Route::get('/', 'MainController@index');

    Route::get('/about_technology', function () {
        return view('about_technology');
    })->name('about_technology');

    Route::get('/for_media', function () {
        return view('for_media');
    })->name('for_media');

    Route::get('/media_about_us', function () {
        return view('media_about_us');
    })->name('media_about_us');

    Route::get('/news_show', function () {
        return view('layouts.partials.news.news_show');
    })->name('news_show');

    Route::get('/about_modex', function () {
        return view('about_modex');
    })->name('about_modex');

    Route::get('/team', function () {
        return view('team');
    })->name('team');
});

//Route::group(['prefix' => config('project.admin_prefix') . '/news', 'as' => 'admin.news', 'middleware' => ['adminMiddleware']], function () {
//    $c = 'Admin\NewsController@';
//    Route::get('/', $c . 'index')->name('');
//    Route::get('get-list', $c . 'getList')->name('.list');
//    Route::get('create', $c . 'create')->name('.create');
//    Route::post('store', $c . 'store')->name('.store');
//    Route::get('{id}/edit', $c . 'edit')->name('.edit');
//    Route::post('{id}/update', $c . 'update')->name('.update');
//    Route::get('{id}/delete', $c . 'delete')->name('.delete');
//});




