<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\VarDumper\VarDumper;

class AdminController extends Controller{
    protected $employees;
    protected $count; 

    public function __construct(){
        $this->employees = User::all("id", "name", "email");
        $this->count = count($this->employees);
    }

    public function index(){
        
        session()->put("count", $this->count);

        return view("admin.index", ["employees" => $this->employees]);

    }

    public function showRegisterUser(){
        // if is true admin ...
        return view("admin.register_user.index", ["bool" => true]);
    }

    public function store(Request $request){
        
        $user = User::create($request['credentials']);
        return redirect()->route($user->wasRecentlyCreated ? "admin.index" : "employee.add")
        ->with('status', [
            "count" => count($this->employees)+1, 
            "response" => $user->wasRecentlyCreated ? 
            'Employee added successfully' : 'Some fields are wrong',
        ]);

    }

    public function destroy($id){

        $employee = User::find($id);
        $response = $employee->delete();

        return redirect()->route("admin.index")->with('status', [
            "response" => $response ? 
            'Employee deleted successfully' : 'Something went wrong',
        ]);
    }
}
