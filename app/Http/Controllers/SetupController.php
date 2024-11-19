<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SetupController extends Controller
{
    public function updateENV(Request $request)
    {
        try {
            $merchantId = $request->input('MERCHANT_ID');
            $terminalId = $request->input('TERMINAL_ID');
    
            if (!$merchantId || !$terminalId) {
                return response()->json(['status' => false, 'message' => 'Invalid input.'], 400);
            }
    
            // Lokasi file .env
            $path = base_path('.env');
            if (file_exists($path)) {
                file_put_contents($path, preg_replace(
                    "/^MERCHANT_ID=.*$/m",
                    "MERCHANT_ID={$merchantId}",
                    file_get_contents($path)
                ));
                file_put_contents($path, preg_replace(
                    "/^TERMINAL_ID=.*$/m",
                    "TERMINAL_ID={$terminalId}",
                    file_get_contents($path)
                ));
            }
    
            return response()->json(['status' => true, 'message' => 'Environment variables updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
