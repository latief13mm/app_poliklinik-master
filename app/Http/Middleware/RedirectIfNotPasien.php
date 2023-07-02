<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotPasien
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::pasien()->role === 'pasien') {
            return $next($request);
        }

        return redirect('/')->with('error', 'Anda tidak memiliki akses sebagai pasien.');
    }
}
