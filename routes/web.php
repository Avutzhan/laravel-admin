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

    Route::get('/', function () {

    return view('main');
});

Route::get('/about_technology', function () {
    return view('about_technology');
})->name('about_technology');

Route::get('/for_media', function () {
    return view('for_media');
})->name('for_media');

Route::get('/news', function () {
    return view('news');
})->name('news');

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


