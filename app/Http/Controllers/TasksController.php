<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = [1, 2, 3, 4, 5];
        return view('tasks')->withTasks(\App\Task::all());
    }

    public function show(\App\Task $task)
    {
        return view('task')->withTask($task);
    }

    public function form()
    {
        return view('create-task-form');
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:5000'
        ]);

        $user = Auth::user();

        $task = new \App\Task();
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->creator = $user->id;
        $task->save();

        session()->flash('message', 'Task has been created!');

        return redirect('/');
    }

    public function delete(\App\Task $task)
    {
        $user = Auth::user();
        if ($task->creator === $user->id) {
            $task->delete();
            session()->flash('message', 'Task has been deleted!');
            return redirect()->route('tasks');
        }
        return 'ломаеш ага, папался хакер!!! не ломай';
    }
}
