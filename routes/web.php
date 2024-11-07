<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/awal', function () {
    return view('home/index');
});

Route::get('/qty', function () {
    return view('qty/index');
});

Route::get('/konfir', function () {
    return view('confirm/index');
});


Route::get('/payment', function () {
    return view('payment/index');
});

Route::get('/done', function () {
    return view('done/index');
});