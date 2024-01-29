<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        return TaskResource::collection(Task::all());
    }

    public function show(Task $task){
        return TaskResource::make($task);
    }

    public function store(StoreTaskRequest $request){
        $task = Task::create($request->validated());
        return TaskResource::make($task);
    }

    public function update(UpdateTaskRequest $request, Task $task){
        $task->update($request->validated());
        return TaskResource::make($task);
    }

    public function destroy(Task $task){
        $task->delete();
        return response()->noContent();
    }




}
