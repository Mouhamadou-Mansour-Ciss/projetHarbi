<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class BoquerAuthenticateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() and  Auth::user()->statut == 1 ){
            $request->session()->flush();
            Auth::logout();
            return redirect('/login')->with('error', 'Votre compte est bloqué. Contactez l\'administrateur.');
        }else{
            return $next($request);
        }
        
    }
}
