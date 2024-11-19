<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSetupVariables
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $merchantId = env('MERCHANT_ID');
        $terminalId = env('TERMINAL_ID');
        // $expiredTime = env('EXPIRED_TIME');

        if (empty($merchantId) || empty($terminalId)) { //  || !session('initialized')
            return redirect('/request');
        }

        return $next($request);
    }
}
