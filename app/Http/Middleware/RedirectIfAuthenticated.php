<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(Auth::check() && Auth::user()->isAdmin()){
                return redirect()->route('admin.home');

            }elseif (Auth::check() && Auth::user()->isSupplier()){
                return redirect()->route('supplier.home');
            }
        }

        return $next($request);
    }
}
