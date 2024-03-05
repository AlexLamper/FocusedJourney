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
        $tasks = Task::where('user_id', $user->id)
            ->orderBy('order')
            ->get();

        // Return the tasks to the tasks.blade.php view
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|max:255',
            'priority' => 'nullable|in:Low,Medium,High',
            'timestamp' => 'required|date_format:Y-m-d\TH:i'
        ]);

        // Create a new Task instance with the validated data
        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $task->priority = $request->priority;
        $task->timestamp = $request->timestamp;

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

    public function destroy(Task $task)
    {
        // Ensure that the authenticated user owns the task
        if ($task->user_id !== auth()->id()) {
            return back()->with('error', 'You are not authorized to delete this task.');
        }

        // Delete the task
        $task->delete();

        return redirect()->route('tasks')->with('success', 'Task deleted successfully.');
    }

    public function updatePriority(Request $request, Task $task)
    {
        $request->validate([
            'priority' => 'required|in:Low,Medium,High',
        ]);

        $task->priority = $request->priority;
        $task->save();

        return response()->json(['message' => 'Task priority updated successfully']);
    }

    public function updateOrder(Request $request)
    {
        $newOrder = $request->all();
        foreach ($newOrder as $item) {
            Task::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json(['message' => 'Task order updated successfully']);
    }
}

