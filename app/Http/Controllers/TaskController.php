<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        // Retrieve the authenticated user, if any
        $user = auth()->user();

        // If user is not logged in, return a message prompting them to log in
        if (!$user) {
            return view('tasks.not-logged-in');
        }

        // Retrieve tasks associated with the authenticated user
        $tasks = Task::where('user_id', $user->id)->get();

        // Return the tasks to the tasks.blade.php view
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|max:255',
        ]);

        // Create a new Task instance with the validated data
        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;

        // Associate the task with the authenticated user
        $task->user_id = auth()->id();

        // Save the task
        $task->save();

        // Redirect back to the task list page with a success message
        return redirect('/tasks')->with('success', 'Task created successfully!');
    }

    public function create()
    {
        // Retrieve the authenticated user
        $user = auth()->user();

        // Return the view with the authenticated user
        return view('tasks.create', compact('user'));
    }
}

