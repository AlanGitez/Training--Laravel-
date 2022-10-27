<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Session;


class SessionController extends Controller
{
    static function flashSession($data = []){
        try {

            if(!count($data) % 2) throw new Exception("need an even number of values ​​to work ");
            foreach($data as $key => $value):
                Session::flash($key, $value);
            endforeach;
            return ["error" => false, "data" => "success"];

        } catch (Exception $e) {
            return ["error" => true, "data" => $e->getMessage()];

        }
        
    }

    static function putSession($data = []){
        try {
            if(!count($data) % 2) throw new Exception("need an even number of values ​​to work ");
            foreach($data as $key => $value):
                Session::put($key, $value);
            endforeach;
            return ["error" => false, "data" => "success"];

        } catch (Exception $e) {
            return ["error" => true, "data" => $e->getMessage()];

        }
        
    }
}
