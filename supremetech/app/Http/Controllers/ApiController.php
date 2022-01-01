<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Http\Resources\UserResource;
use App\Interfaces\TaskRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    private  $taskRepository;
    private  $userRepository;

    public function __construct(TaskRepositoryInterface $taskRepository, UserRepositoryInterface $userRepository)
    {
        $this->taskRepository = $taskRepository;
        $this->userRepository = $userRepository;
    }

    //returns the entire list of tasks
    public function listAllTask()
    {
        return TaskResource::collection($this->taskRepository->getAllTasks());
    }

    //Returns user information and task list of that user
    public function detailUser($id)
    {
        return new UserResource($this->userRepository->getUserById($id));
    }
}
