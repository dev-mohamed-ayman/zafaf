<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CountryMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->ipinfo->country != null && $request->ipinfo->country == "EG") {
            Session::put('country', $request->ipinfo->country);
            Session::put('noCountry', null);
        }
        elseif ($request->ipinfo->country != null && $request->ipinfo->country == "SA") {
            Session::put('country', $request->ipinfo->country);
            Session::put('noCountry', null);
        }
        elseif ($request->ipinfo->country != null && $request->ipinfo->country == "AE") {
            Session::put('country', $request->ipinfo->country);
            Session::put('noCountry', null);
        }else {
            
            
            if($request->ipinfo->country != session('noCountry')) {
                Session::put('country', null);
            }
            
            Session::put('noCountry', $request->ipinfo->country);
            
            // if(session('noCountry') == null || !session('noCountry')) {
            //     Session::put('country', null);
            //     Session::put('noCountry', $request->ipinfo->country);
            // }
        }

        return $next($request);
    }
}
