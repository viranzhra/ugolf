<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/awal', function () {
    return view('home/ugolf');
});

Route::get('/konfir', function () {
    return view('confirm/konfirmasi');
});