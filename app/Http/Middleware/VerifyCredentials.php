<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

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

        $credentials = null;

        if($type == "login"){
            $credentials = $request->validate([
                "email" => "required|email",
                "password" => "required|alpha_num",
            ], $message = ['required' => 'the :attribute field is required']);
            $request['credentials'] = $credentials;

        }elseif($type == "register"){
            $credentials = $request->validate([
                "name" => "required",
                "email" => "required|email",
                "password" => "required|alpha_num",
            ], $message = ['required' => 'the :attribute field is required']);

        }else return redirect(route("employee.index"));

        if(!$credentials) return redirect(route("/"));
        else return $next($request);
    }
}
