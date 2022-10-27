<?php

namespace App\Http\Controllers;

use App\Exceptions\RegisterException;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use Symfony\Component\VarDumper\VarDumper;
use App\Http\Controllers\SessionController;

class AdminController extends Controller{
    protected $employees;
    protected $count; 

    public function __construct(){
        $this->employees = User::all("id", "name", "email");
        $this->count = count($this->employees);
    }

    public function index(){
        
        SessionController::putSession(["count" => $this->count]);
        return view("admin.index", ["employees" => $this->employees]);
    }

    public function showRegisterUser(){
        // if is true admin ...
        return view("admin.register_user.index", ["bool" => true]);
    }

    public function store(Request $request){
        
        try{
            $email = $request['credentials']["email"];

            if(User::where("email", $email)->count())
                throw new Exception("Email must be unique");
            
            $user = User::create($request['credentials']);
            return redirect()->route("admin.index");

        }catch(Exception $e){
            SessionController::flashSession(["error" => $e->getMessage()]);
            return redirect()->back();
        }

    }

    public function destroy($id){

        try {
            $employee = User::find($id);
            if(empty($employee)) 
                throw new Exception("Cannot find user by id: ". $id);
            $employee->delete();
            SessionController::flashSession(["error" => false]);
            return redirect()->back();

        } catch (Exception $e) {
            SessionController::flashSession(["error" => $e->getMessage()]);
            return redirect()->back();
        }
    }
}
