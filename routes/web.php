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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [
        'as' => 'admin',
        'uses' => 'Admin\AdminController@index'
    ]);

    Route::get('/login', [
        'as' => 'admin.login',
        'uses' => 'Admin\AdminController@login'
    ]);

    // Type Product Group
    Route::resource('type-product-group', 'Admin\TypeProductGroupController');

    // Type Product
    Route::resource('type-product', 'Admin\TypeProductController');

    // Slider
    Route::resource('slider', 'Admin\SliderController');

    // Tag
    Route::resource('tag', 'Admin\TagController');

    // Temporary Image
    Route::post('save-temporary', 'Admin\TemporaryImageController@uploadImageFile');

    Route::post('delete-image', 'Admin\TemporaryImageController@deleteImageFile');
});