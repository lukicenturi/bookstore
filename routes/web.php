<?php

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('catalog', 'HomeController@catalog');
Route::get('book/{id}', 'HomeController@book');

Route::group(['middleware' => 'auth'], function() {
    Route::get('borrow/{id}', 'HomeController@borrow');
    Route::get('lend', 'HomeController@lend');
    Route::get('logout', 'Auth\LoginController@logout');
    Route::post('lend', 'HomeController@addBook');
    Route::get('history', 'HomeController@history');
});

Route::get('/home', 'HomeController@index')->name('home');
