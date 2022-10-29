<?php

namespace App\Repositories\Implemetations;

use App\Models\User;
use Exception;

class UserRepository extends Repository {

    public $type;
    protected $model;

    public function __construct(User $model){
        $this->type = "employee";
        $this->model = $model;
        $this->formRoute = "admin.register_user.index";

    }


    public function store($body){
        
        try{
            $email = $body["email"];

            if(User::where("email", $email)->count()):
                throw new Exception(
                    $this->generateResponse(true, "Email must be unique")['data'] 
                    ?? "Cannot find more data"
                );    
            endif;

            $user = User::create($body);
            return $this->generateResponse(false, "$this->type created successfully");

        }catch(Exception $e){

            return $this->generateResponse(true, $e->getMessage());


        }
    }


}