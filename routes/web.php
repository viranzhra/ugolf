<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\BeliTiketController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ConfirmController;

/* Jika Merchant Code, Terminal Code, dan FE_Code Tervalidasi */
Route::middleware('isTrue')->group(function () {
    Route::get('/tiket', [BeliTiketController::class, 'index'])->name('tiket.index');
    Route::post('/tiket/konfirmasi', [BeliTiketController::class, 'konfirmasi'])->name('konfirmasi');
    Route::post('/tiket/pembayaran', [BeliTiketController::class, 'pembayaran'])->name('pembayaran');
    Route::post('/tiket/status-pembayaran', [BeliTiketController::class, 'status_pembayaran'])->name('status_pembayaran');
});

Route::get('/', function () {
    return redirect('/awal');
});

Route::get('/request', function () {
    return view('file Request/index');
});

Route::post('/update-env', [SetupController::class, 'updateENV'])->name('updateEnv');

Route::get('/awal', function () {
    return view('home/index');
})->name('awal');

// Rute untuk halaman input jumlah tiket (qty)
Route::get('/qty', [TicketController::class, 'index'])->name('qty.index');
Route::post('/qty', [TicketController::class, 'store'])->name('qty.store');

// Rute untuk halaman konfirmasi jumlah tiket
Route::get('/konfir', [ConfirmController::class, 'index'])->name('confirm.index'); // Pastikan rute ini mengarah ke ConfirmController

// Rute lainnya
Route::get('/payment', function () {
    return view('payment/index');
});

Route::post('/done', function () {
    return view('done/index');
});

Route::get('/coba', function () {
    return view('coba_ping');
});

Route::get('/cek', function () {
    return view('cekping');
});
