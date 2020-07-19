<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('create');
});

Route::post('/create', 'MessageController@store');
Route::resource('messages', 'MessageController');
