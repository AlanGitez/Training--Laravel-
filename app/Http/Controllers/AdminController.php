<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\VarDumper\VarDumper;

class AdminController extends Controller{
    private $isAdmin;
    protected $employees;
    protected $count; 

    public function __construct(){
        $this->isAdmin = /*Verificar si es admin al AdminModel */ true;
        $this->employees = User::all("id", "name", "email");
        $this->count = count($this->employees);
    }

    public function index(){
        // echo "<pre>";
        // var_dump(session("success"));
        // echo "<pre>";

        return view("admin.index", ["employees" => $this->employees]);
    }

    public function showRegisterUser(){
        // if is true admin ...
        return view("admin.register_user.index", ["bool" => true]);
    }

    public function store(Request $request){
        
        $input = $request->input();
        $input["password"] = Hash::make($request->password);
        array_shift($input);
        array_pop($input);
        
        $user = User::create($input);
        session()->put("pruebas", $input);
        return redirect()->route($user->wasRecentlyCreated ? "admin" : "admin/add")
        ->with('status', [
            "count" => count($this->employees)+1, 
            "response" => $user->wasRecentlyCreated ? 
            'Employee added successfully' : 'Some fields are wrong',
        ]);
    }

    public function destroy($id){

        $employee = User::find($id);
        $response = $employee->delete();

        return redirect()->route("admin")->with('status', [
            "count" => $this->count-1, 
            "response" => $response ? 
            'Employee deleted successfully' : 'Something went wrong',
        ]);
    }
}
