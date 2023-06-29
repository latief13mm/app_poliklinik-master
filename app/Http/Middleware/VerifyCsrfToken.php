<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\TokenMismatchException;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    protected function shouldPassThrough($request)
{
    $routes = [
        'user/logout',
        'pasien/logout',
    ];

    foreach ($routes as $route) {
        if ($request->is($route)) {
            return true;
        }
    }

    return false;
}


    public function handle($request, Closure $next)
{
    if ($this->isReading($request) || $this->shouldPassThrough($request) || $this->tokensMatch($request)) {
        return $this->addCookieToResponse($request, $next($request));
    }

    $guard = null;

    if (Auth::guard('user')->check()) {
        $guard = 'user';
    } elseif (Auth::guard('pasien')->check()) {
        $guard = 'pasien';
    }

    if ($guard) {
        return $next($request);
    }

    throw new TokenMismatchException;
}

}