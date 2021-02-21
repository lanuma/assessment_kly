<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->is(['auth', 'auth/*'])) {
            if (Auth::guard('admin')->check() == true) {
                return redirect()->route('admin.index');
            }
        }

        return $next($request);
    }
}
