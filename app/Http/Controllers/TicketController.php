<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Tampilkan halaman konfirmasi tiket.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        return redirect()->route('tiket.index');
    }

    /**
     * Proses input jumlah tiket dan simpan ke sesi, lalu redirect ke halaman konfirmasi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi input jumlah tiket
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Simpan jumlah tiket ke dalam sesi
        $request->session()->put('quantity', $request->input('quantity'));

        // Redirect ke halaman konfirmasi dengan pesan sukses
        return redirect()->route('qty.index')->with('success', 'Tiket berhasil diproses!');
    }
}
