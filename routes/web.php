<?php

Route::get('/', function () {
    return view('welcome');
});

Route::post('threads/{thread}/replies', 'ReplyController@store')->name('threads.reply');
Route::resource('threads', 'ThreadController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
