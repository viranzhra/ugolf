<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Terminal;
use App\Models\PaymentType;
use App\Models\Merchant;
use App\Models\Config;
use App\Models\CMS;
// use App\Services\QRISService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class BeliTiketController extends Controller
{
    // private $qrisService;

    // public function __construct(QRISService $qrisService)
    // {
    //     $this->qrisService = $qrisService;
    // }

    public function index()
    {
        return view('qty.index');
    }

    public function konfirmasi(Request $request)
    {
        $request->validate([
            'qty' => 'required|integer|min:1'
        ]);

        $qty = $request->qty;
        return view('confirm.index', compact('qty'));
    }

    // public function showTicketForm()
    // {
    //     // Halaman input jumlah tiket
    //     return view('kiosk.beli_tiket');
    // }

    public function processTicketPurchase(Request $request)
    {
            $request->validate([
                'qty' => 'required|integer|min:1'
            ]);

            $qty = $request->qty;
            $amountPerTicket = 100;
            $totalAmount = $amountPerTicket * $qty;
        
            $transactionData = [
                'merchantId' => env('MERCHANT_ID'),
                'terminalId' => env('TERMINAL_ID'),                
                'qty' => $qty
            ];
        
            $response = Http::withHeaders([
                'Content-Type' => 'application/json'
            ])->post(env('API_URL') . '/qris/generate', $transactionData);
        
            //dd($response->body());

         if ($response->successful()) {
            // dd($response->json());
            $responseData = $response->json();
            
            if ($responseData['success']) {
                $data = $responseData['data'];
                $transaction = $responseData['transaction'];
                return view('payment/draft_index', [
                    'qrisData' => $data,
                    'transaction' => $transaction,
                ]);
            }   
        } else {
            // dd($response->json());
            return back()->withErrors($response->json()['message'] ?? 'Terjadi kesalahan pada server');        
        }

        return back()->withErrors('Gagal membuat QRIS. Silakan coba lagi.');
    }

    public function sukses(Request $request)
    {
        $request->validate([
            'qty' => 'required|integer|min:1'
        ]);

        $qty = $request->qty;
        return view('done.index', compact('qty'));
    }

    public function showQRIS($trx_id)
    {
        // Tampilkan halaman QRIS
        $transaction = Transaction::findOrFail($trx_id);

        // Data QR code (sesuaikan dengan data yang diperlukan oleh QRIS)
        $qrData = $transaction->paycode;

        return view('kiosk.qris', compact('transaction', 'qrData'));
    }
}
