<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\QtyController;
// use App\Http\Controllers\qtyController;

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

// Route::get('/qty', [qtyController::class, 'index'])->name('qty.index');
// Route::post('/qty/confirm', [qtyController::class, 'confirm'])->name('qty.confirm');
// Route::get('/qty', [QtyController::class, 'index']);
