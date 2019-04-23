<?php

Route::get('/', function () {
    return view('welcome');
});

Route::post('threads/{channel}/{thread}/replies', 'ReplyController@store')->name('threads.reply');

Route::get('threads/{channel}/{thread}', "ThreadController@show");

Route::resource('threads', 'ThreadController')->only(['create', 'store', 'index']);

Route::get('/threads/{channel}', "ThreadController@index");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
