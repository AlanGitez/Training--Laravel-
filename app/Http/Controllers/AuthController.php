<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Symfony\Contracts\Service\Attribute\Required;

class AuthController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        if($user) session()->put("id", $user['id']);
        

        return view("employee.index");
    }

    public function login(Request $req){
 
        if(session("id")) return redirect(route("employee.index"));
        $credentials = $req["credentials"];

        if(Auth::attempt($credentials)):
            $user = Auth::user();
            $token = $user->createToken('log_token')->plainTextToken;
    
            Cookie::queue("cookie_token", $token, 60 * 24);
            session()->put("id", $user['id']);
            return redirect(route("employee.index"));

        else:
            return redirect("/");
        endif;
    }

    public function logout(Request $req){
        Cookie::queue(Cookie::forget("cookie_token"));
        session()->put("id", null);
        return redirect(route("employee.index"));
    }
}
