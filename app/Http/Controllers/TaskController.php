<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests\TaskRequest;
use Request;

class TaskController extends Controller
{
    public function index()
    {
        return Task::all();
    }

    public function store(TaskRequest $request)
    {
        $validated = $request->validated();
        return Task::create($request->all());
    }

    public function show(Task $task)
    {
        return $task;
    }

    public function update(TaskRequest $request, Task $task)
    {
        $validated = $request->validated();
        $task->update($request->all());
        return $task;
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return $task;
    }
}
