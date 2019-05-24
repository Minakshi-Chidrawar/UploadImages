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

Route::get('form','FormController@create');
Route::post('form','FormController@store');

Route::get('images-upload', 'FormController@imagesUpload');
Route::post('images-upload', 'FormController@imagesUploadPost')->name('images.upload');

Route::get('uploadImage','FormController@uploadImage');
Route::post('uploadImage','FormController@uploadImagePost');