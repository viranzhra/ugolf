<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ConfirmController; // Tambahkan import ConfirmController

Route::get('/', function () {
    return view('welcome');
});

Route::get('/awal', function () {
    return view('home/index');
});

// Rute untuk halaman input jumlah tiket (qty)
Route::get('/qty', [TicketController::class, 'index'])->name('qty.index');
Route::post('/qty', [TicketController::class, 'store'])->name('qty.store');

// Rute untuk halaman konfirmasi jumlah tiket
Route::get('/konfir', [ConfirmController::class, 'index'])->name('confirm.index'); // Pastikan rute ini mengarah ke ConfirmController

// Rute lainnya
Route::get('/payment', function () {
    return view('payment/index');
});

Route::get('/done', function () {
    return view('done/index');
});

Route::get('/coba', function () {
    return view('coba_ping');
});

Route::get('/cek', function () {
    return view('cekping');
});
