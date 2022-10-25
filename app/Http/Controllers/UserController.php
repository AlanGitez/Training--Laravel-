<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request){
        $request->session()->put("variable", "de prueba");
        echo "<pre>";
        var_dump($request->header());
        echo "<pre>";

        $employees = User::all();
        // return view("admin.index", ["employees" => $employees]);
    }
}
