<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VerifyCredentials
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $type = null){


        if($type == "login"){

            $credentials = $request->validate([
                "email" => "required|email",
                "password" => "required|alpha_num",
            ], $message = ['required' => 'the :attribute field is required']);
            $request->merge(["credentials" => $credentials]);

        }elseif($type == "register"){
            $credentials = $request->validate([
                "name" => "required",
                "email" => "required|email",
                "password" => "required|alpha_num",
            ], $message = ['required' => 'the :attribute field is required']);
            
            $credentials["password"] = Hash::make($credentials['password']);
            $request->merge(["credentials" => $credentials]);
            
        }
        // if(!$credentials) return redirect(route("/"));
        // else return $next($request);
        return $next($request);
    }
}
