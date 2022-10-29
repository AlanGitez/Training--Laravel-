<?php

namespace App\Http\Controllers;

// use App\Exceptions\RegisterException;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\MessageBag;
// use Symfony\Component\VarDumper\VarDumper;
use App\Http\Controllers\SessionController;
use App\Repositories\Implemetations\TaskRepository;
use App\Repositories\Implemetations\UserRepository;

class AdminController extends Controller{
    protected $employees;
    protected $count; 
    protected $userRepository;
    protected $repositories;

    
    public function __construct(UserRepository $userRepository, TaskRepository $taskRepository){
        $this->userRepository = $userRepository;
        $this->employees = User::all("id", "name", "email");
        $this->count = count($this->employees);
        $this->repositories = [$userRepository, $taskRepository];
        
    }

    public function index(){
        
        SessionController::putSession(["count" => $this->count]);
        return view("admin.index", ["employees" => $this->employees]);
    }

    public function showForm($model){

        foreach($this->repositories as $repo):
            if($model == $repo->type):
                return view($repo->formRoute, ["bool" => true]);
            endif;
        endforeach;

    }

    public function store(Request $req){
        
        $response = $this->userRepository->store($req['credentials']);

        if($response['error']){
            SessionController::flashSession(["error" => $response['data']]);
            return redirect()->back();
        }

        return redirect()->route("admin.index");

    }

    public function destroy($model, $id ){
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
