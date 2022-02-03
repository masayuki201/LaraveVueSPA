<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests\TaskRequest;
use Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
//        $per_page = 5;
//        $input = $request->all();
//
//        $tasks = Task::select('id', 'title', 'content', 'person_in_charge');
//        if (!empty($input['person_in_charge'])) {
//            $tasks = $tasks->where('person_in_charge', $input['person_in_charge']);
//        }
//        if (!empty($input['title'])) {
//            $tasks = $tasks->where('title', 'LIKE', "%{$input['title']}%");
//        }
//        $tasks = $tasks->paginate($per_page);
//
//        return response()->json($tasks);

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
