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
    //Main Route
    Route::get('/', 'MainController@index');

    //About Technology Route
    Route::get('/about_technology', function () {
        return view('pages.about_technology');
    })->name('about_technology');

    //For Media Route
    Route::get('/for_media', function () {
        return view('pages.for_media');
    })->name('for_media');

    //News Route
    Route::get('/news', 'ModexNewsController@index')->name('media_about_us');

    Route::post('/news/loaddata','ModexNewsController@loadDataAjax' );

    Route::get('/news/{id}', 'ModexNewsController@show')->name('news_show');

    //About Modex Route
    Route::get('/about_modex', function () {
        return view('pages.about_modex');
    })->name('about_modex');

    //Team Route
    Route::get('/team', function () {
        return view('pages.team');
    })->name('team');
});




