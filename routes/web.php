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
Route::get('/','ShortLinkController@index')->name('generate');

Route::post('/','ShortLinkController@store')->name('generate.post');

Route::get('/{shortUrl}','ShortLinkController@shortenLink')->name('shorten.link');

Route::get('/admin/index','AdminController@index')->name('admin.index');

Route::get('admin/delete/{id}','AdminController@destroy')->name('delete');
