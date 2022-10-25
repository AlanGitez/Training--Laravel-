<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller{
    private $isAdmin;
    private $emplooyes;

    public function __construct(){
        $this->isAdmin = /*Verificar si es admin al AdminModel */ true;
    }

    public function index(){
        $emplooyes = User::all();
        return view("admin.index", ["employees" => $emplooyes]);
    }

    public function showRegisterUser(){

        // if is true admin ...
        return view("admin.register_user.index", ["bool" => true]);
    }

    public function add(Request $request){
        $input = $request->input();
        array_shift($input);
        array_pop($input);

        $response = new User();
        foreach ($input as $key => $value):
            $response[$key] = $value;
        endforeach;
        

        echo "<pre>";
        var_dump($response);
        echo "<pre>";
        $bool = true;

        // if($bool):
        //     return redirect()->route("admin")->with('success', 'Employee added successfully');
        // else:
        //     return redirect()->route("admin/add")->with('Warning', 'Some fields are wrong');
        // endif;
    }
}
