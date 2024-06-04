<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        // Retrieve the authenticated user, if any
        $user = auth()->user();

        // Retrieve tasks associated with the authenticated user
        $todos = Todo::where('user_id', $user->id)
            ->orderBy('order')
            ->get();

        // Return the tasks to the todo.index view
        return view('todo.index', compact('todos'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|max:255',
            'priority' => 'nullable|in:Low,Medium,High',
            'due_date' => 'required|date_format:Y-m-d\TH:i',
        ]);

        // Create a new Todo instance with the validated data
        $todo = new Todo();
        $todo->name = $request->name;
        $todo->description = $request->description;
        $todo->priority = $request->priority;
        $todo->due_date = $request->due_date; // Updated to 'due_date'

        // Associate the todo with the authenticated user
        $todo->user_id = auth()->id();

        // Save the todo
        $todo->save();

        // Redirect back to the task list page with a success message
        return redirect('/todo')->with('success', 'Todo created successfully!');
    }

    public function create()
    {
        // Retrieve the authenticated user
        $user = auth()->user();

        // Return the view with the authenticated user
        return view('todo.create', compact('user'));
    }

    public function destroy(Todo $todo)
    {
        // Ensure that the authenticated user owns the task
        if ($todo->user_id !== auth()->id()) {
            return back()->with('error', 'You are not authorized to delete this todo.');
        }

        // Delete the task
        $todo->delete();

        return back()->with('success', 'Todo deleted successfully.');
    }

    public function updatePriority(Request $request, Todo $todo)
    {
        $request->validate([
            'priority' => 'required|in:Low,Medium,High',
        ]);

        $todo->priority = $request->priority;
        $todo->save();

        return response()->json(['message' => 'Todo priority updated successfully']);
    }

    public function updateOrder(Request $request)
    {
        try {
            $newOrder = $request->all();
            \Log::info('New Order:', $newOrder); // Log the received data

            foreach ($newOrder as $item) {
                \Log::info('Updating order for task ID ' . $item['id'] . ' to ' . $item['order']);
                Todo::where('id', $item['id'])->update(['order' => $item['order']]);
            }

            return response()->json(['message' => 'Task order updated successfully']);
        } catch (\Exception $e) {
            \Log::error('Error updating todo order: ' . $e->getMessage());
            return response()->json(['error' => 'Error updating todo order'], 500);
        }
    }

    public function toggleCompleted(Request $request, Todo $todo)
    {
        // Toggle the 'completed' field
        $todo->update(['completed' => !$todo->completed]);

        return response()->json(['message' => 'Todo completed toggled successfully']);
    }

}
