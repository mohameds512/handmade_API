<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {
//        if(auth()->user() && !auth()->user()->active){
//            Auth::logout();
//
//            $request->session()->invalidate();
//
//            $request->session()->regenerateToken();
//
//            return redirect()->route('login')->with('error', 'Your Account is suspended, please contact Admin.');
//        }
        return $next($request);
    }
}
