<?php 

namespace App\Middleware;

use Illuminate\Support\Facades\Auth;

class checkAdmin {

    public function handle($request, $next) {
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role === 1) {
            return $next($request);
        }
        return redirect()->route('form.login');
    }

}