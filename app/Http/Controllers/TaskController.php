<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskCategory;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('taskCategory')->get();

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    public function create()
    {
        $taskCategories = TaskCategory::all();
        return view('tasks.create', compact('taskCategories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'completed' => 'required|boolean',
            'task_categories_id' => 'required|exists:task_categories,id',
        ]);

        Task::create($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());

        return redirect()->route('tasks.index');
    }
}
