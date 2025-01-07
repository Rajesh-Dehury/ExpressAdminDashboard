<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetUserCountry
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the country name is already stored in the session
        if (!Session::has('user_country')) {
            $clientIp = $request->ip();
    
            // Fetch country name from geoplugin
            $geoPluginUrl = "http://www.geoplugin.net/json.gp?ip={$clientIp}";
            $response = Http::get($geoPluginUrl);
            $geoData = $response->json();
    
            if ($response->successful() && isset($geoData['geoplugin_countryName'])) {
                $countryName = $geoData['geoplugin_countryName'];
                Session::put('user_country', $countryName);
            } else {
                Session::put('user_country', 'India');
            }
        }

        return $next($request);
    }
}
