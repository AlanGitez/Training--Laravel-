<?php

namespace App\Http\Middleware;

use App\Http\Controllers\SessionController;
use Closure;
use Exception;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Session;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    public function handle($request, Closure $next, ...$guards){

        try {
            if($cookie = $request->cookie("cookie_token")){
                $id = Auth::id();

                if(Session::get("user")['id'] != $id) throw new Exception("Please, login first");
                    
                return $next($request);
            }else throw new Exception("Please, login first");

        } catch (Exception $e) {
            return redirect(route('employee.login'));
        }
    }
    
}
