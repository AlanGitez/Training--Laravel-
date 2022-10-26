<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyLoginCredentials
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next){
        
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required|alpha_num",
        ], $message = ['required' => 'the :attribute field is required']);
        $request['credentials'] = $credentials;
        return $next($request);

    }
}
