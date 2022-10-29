<?php

namespace App\Repositories\Implemetations;

use App\Models\Task;
use App\Models\User;
use Exception;

class TaskRepository extends Repository {

    public $type;
    protected $model;

    public function __construct(Task $model){
        $this->type = "task";
        $this->model = $model;   
        $this->formRoute =  "admin.register_task.index";
    }

    public function store($body){
        
        try{
            $title = $body["title"];

            if(Task::where("title", $title)->count()):
                throw new Exception(
                    $this->generateResponse(true, "Title must be unique")['data'] 
                    ?? "Cannot find more data"
                );    
            endif;

            $task = Task::create($body);
            return $this->generateResponse(false, "$this->type created successfully");

        }catch(Exception $e){

            return $this->generateResponse(true, $e->getMessage());

        }
    }


}