<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Symfony\Contracts\Service\Attribute\Required;



class AuthController extends Controller{

    public function index(Request $request){
        
        try {
            $id = Auth::id();
            if(empty(User::find($id)))
                throw new Exception("Unauthorized");
            SessionController::putSession(["id" => $id]);

        } catch (Exception $e) {
            SessionController::flashSession(["error" => $e->getMessage()]);

        }
               
        return view("employee.index");
    }

    public function login(Request $req){
        if(Session::get("id")) return redirect(route("employee.index"));

        try {
            $credentials = $req["credentials"];
            if(!Auth::attempt($credentials))
                throw new Exception("Cannot varify your credentials, contact your admin.");
            else{
                $user = Auth::user();    
               $token = $user->createToken('log_token')->plainTextToken;
       
               Cookie::queue("cookie_token", $token, 60 * 24);
               SessionController::putSession(["id" => $user['id']]);
            }
            
            return redirect(route("employee.index"));

        } catch (Exception $e) {
            SessionController::flashSession(["error" => $e->getMessage()]);
            return redirect()->back();
        }
        

    }

    public function logout(Request $req){
        Cookie::queue(Cookie::forget("cookie_token"));
        SessionController::putSession(["id" => null]);
        return redirect(route("employee.index"));
    }
}
