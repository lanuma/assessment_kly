<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if (Auth::guard('admin')->check() == true) {
            $this->admin = Auth::guard('admin')->user();

            view()->share('admin', $this->admin);

            return $next($request);
        }

        return redirect()->route('auth.dashboard');
    }
}
