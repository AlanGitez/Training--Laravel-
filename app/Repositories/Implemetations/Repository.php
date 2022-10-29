<?php

namespace App\Repositories\Implemetations;

use App\Http\Utils\generateResponse;
use App\Http\Controllers\SessionController;
use App\Models\User;
use Exception;

class Repository {

    protected $response;
    public $formRoute;

    public function __construct(){
        $this->response = [];
    }

    protected function generateResponse(
        $bool, 
        $data){

        return [
            'error' => $bool ?? false,
            'data' => $data ?? ""
        ];
    }
    


}