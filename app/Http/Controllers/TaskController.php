<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //Task一覧・検索
    public function index(Request $request)
    {
        $per_page = 5;      //1ページあたりの件数
        $input = $request->all();

        $tasks = Task::select('id', 'title', 'content', 'person_in_charge');
        if (!empty($input['person_in_charge'])) {
            $tasks = $tasks->where('person_in_charge', $input['person_in_charge']);
        }
        if (!empty($input['title'])) {
            $tasks = $tasks->where('title', 'LIKE', "%{$input['title']}%");
        }
        $tasks = $tasks->paginate($per_page);

        return response()->json($tasks);
    }

    //Task追加
    public function store(TaskRequest $request)
    {
        $validated = $request->validated();
        return Task::create($request->all());
    }

    //TAsk詳細
    public function show(Task $task)
    {
        return $task;
    }

    //Task編集
    public function update(TaskRequest $request, Task $task)
    {
        $validated = $request->validated();
        $task->update($request->all());
        return $task;
    }

    //Task削除
    public function destroy(Task $task)
    {
        $task->delete();

        return $task;
    }
}
