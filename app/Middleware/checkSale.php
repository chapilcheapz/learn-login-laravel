<?php 

namespace App\Middleware;

use Illuminate\Support\Facades\Auth;

class checkSale {

    public function handle($request, $next) {
        if (Auth::check() && Auth::user()->role === 'sale') {
            return $next($request);
        }
        return redirect('/loginSale');
    }

}