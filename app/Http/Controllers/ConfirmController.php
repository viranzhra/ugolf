<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfirmController extends Controller
{
    /**
     * Tampilkan halaman konfirmasi tiket.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Ambil data quantity dari sesi; beri nilai default 0 jika tidak ada data
        $quantity = $request->session()->get('quantity', 0);

        // Menampilkan view confirm.index dengan data quantity
        return view('confirm.index', compact('quantity'));
    }
}
