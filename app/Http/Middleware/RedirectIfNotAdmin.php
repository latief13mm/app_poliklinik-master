<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdmin
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
        if (Auth::check()) {
            $role = Auth::user()->role;
    
            if ($role === 'user' || $role === 'pasien') {
                return $next($request);
            }
        }
    
        return redirect('welcome')->with('error', 'Anda tidak memiliki akses.');
    }
}
