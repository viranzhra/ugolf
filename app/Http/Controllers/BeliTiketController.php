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

    public function index(Request $request)
    {
        $quantity = $request->session()->get('quantity', 0);

        return view('qty.index', compact('quantity'));
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

    public function pembayaran(Request $request)
    {
        $request->validate([
            'qty' => 'required|integer|min:1',
        ]);

        $qty = $request->qty;
        $expire = (int)(env('EXPIRED_TIME') ?? 5);
        $amountPerTicket = 100;
        $totalAmount = $amountPerTicket * $qty;
        
        $transactionData = [
            'merchantId' => env('MERCHANT_ID'),
            'terminalId' => env('TERMINAL_ID'),                
            'qty' => $qty,
            'expire' => $expire
        ];
        
        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post(env('API_URL') . '/qris/generate', $transactionData);
        
        //dd($response->body());

        if ($response->successful()) {
            // dd($response->json());
            $responseData = $response->json();
            
            if (!$responseData) {
                return redirect()->route('tiket.index')->withErrors('Terjadi kesalahan pada server');
            }
            
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
            return redirect()->route('tiket.index')->withErrors($response->json()['message'] ?? 'Terjadi kesalahan pada server');        
        }
        return redirect()->route('tiket.index')->withErrors('Gagal membuat transaksi. Silakan coba lagi.');
    }

    public function sukses(Request $request)
    {
        $request->merge([
            'qty' => 1,
            'amount' => 100,
            'total_amount' => 100,
            'payment_date' => '2024-11-14 04:09:28'
        ]);
        
        $request->validate([
            'qty' => 'required|integer|min:1',
            'amount' => 'required|numeric',
            'total_amount' => 'required|numeric',
            'payment_date' => 'required|date',
        ]);

        $qty = $request->qty;
        $amount = $request->amount;
        $totalAmount = $request->total_amount;
        $paymentDate = $request->payment_date;

        return view('done.draft_index', compact('qty', 'amount', 'totalAmount', 'paymentDate'));    
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
