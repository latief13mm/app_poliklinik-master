<?php

namespace App\Http\Middleware;

use Closure;

class StartSession
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
        return $next($request);
    }

    protected function getSessionName($request)
{
    $sessionName = $request->route('guard') ?: 'default'; // Menggunakan parameter rute sebagai nama session atau default jika tidak ada

    return config('session.cookie').config('session.session_divider').$sessionName;
}
}
