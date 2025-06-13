<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            // Jika user belum login, redirect ke route login atau halaman lain
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        return $next($request);
    }
}
